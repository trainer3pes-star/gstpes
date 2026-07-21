# Deployment — same Hostinger KVM 4 VPS as the LMS, fully isolated

This app deploys to `/opt/gstlab` on the same VPS that runs the LMS
(`/opt/peslms`). The two are isolated by design — separate directory,
separate Docker Compose **project name** (`gstlab`, always passed
explicitly with `-p`), separate containers, separate database, separate
host port, separate host-nginx vhost/subdomain.

**Known incident (first deploy): do not omit `-p gstlab`.** Docker Compose
auto-names a project after the *basename* of the directory it's run from,
not the full path. Both this repo's and the LMS's compose files live in a
folder literally called `docker/` — `/opt/gstlab/docker` and
`/opt/peslms/docker` both reduce to the same basename. The very first
deploy here omitted an explicit project name, so both stacks resolved to
the identical default project `docker`, and Compose treated the LMS's live
`docker-php-1`/`docker-nginx-1`/`docker-mariadb-1` containers as *this*
project's own — stopping and replacing production Moodle with the GST
stack (the underlying data volumes were untouched, since MariaDB doesn't
reinitialize a non-empty data directory, but the running containers were
briefly the wrong app). Recovered by re-running the LMS's own `up -d` from
`/opt/peslms/docker`, which recreated its containers against its own
volumes. Every command below now passes `-p gstlab` explicitly (also set as
`COMPOSE_PROJECT_NAME=gstlab` in `docker/.env.example`) specifically so
this can't recur — never drop it from a command run on this VPS.

## One-time VPS setup

```bash
ssh deploy@200.97.164.252

# 1. Separate clone, separate directory from the LMS.
sudo mkdir -p /opt/gstlab && sudo chown deploy:deploy /opt/gstlab
git clone https://github.com/trainer3pes-star/gstpes.git /opt/gstlab
cd /opt/gstlab

# 2. Own .env — real DB credentials, never committed. COMPOSE_PROJECT_NAME
#    is already set to gstlab in the example file; do not remove it.
cp docker/.env.example docker/.env
# edit docker/.env: set real DB_PASSWORD/DB_ROOT_PASSWORD, confirm
# APP_BASE_URL matches the subdomain chosen below.

# 3. Bring up the stack. -p gstlab is redundant with COMPOSE_PROJECT_NAME
#    in .env but kept explicit as defense in depth.
cd docker
docker compose -p gstlab -f docker-compose.yml -f docker-compose.prod.yml up -d

# 4. Run the one-time schema change for the course field added to
#    self-registration (see the registration form / Home_model::save_user):
docker compose -p gstlab -f docker-compose.yml -f docker-compose.prod.yml exec -T mariadb \
  mysql -u root -p"$(grep DB_ROOT_PASSWORD ../docker/.env | cut -d= -f2)" "$(grep DB_NAME ../docker/.env | cut -d= -f2)" \
  -e "ALTER TABLE gst_user ADD COLUMN course VARCHAR(20) NULL AFTER contact;"
```

Then, outside the app containers, on the host:

```bash
# 5. DNS: add an A record for gstlab.practicaleduskills.com -> 200.97.164.252
#    and confirm it resolves before continuing.

# 6. Host nginx + TLS for the subdomain.
sudo cp /opt/gstlab/docker/nginx-host/gstlab.practicaleduskills.com.conf \
   /etc/nginx/sites-available/gstlab.practicaleduskills.com
sudo ln -s /etc/nginx/sites-available/gstlab.practicaleduskills.com /etc/nginx/sites-enabled/
sudo nginx -t && sudo systemctl reload nginx
sudo certbot --nginx -d gstlab.practicaleduskills.com
```

**After this one-time setup, the loop is automated**: push/merge to `main` →
`.github/workflows/deploy.yml` SSHes into the VPS, `git pull`s
`/opt/gstlab`, and runs `docker compose -p gstlab up -d` — same secrets
(`VPS_HOST`, `VPS_USER`, `VPS_PORT`, `VPS_SSH_KEY`) as the LMS's own
workflow can be reused since they point at the same VPS, but the workflow
itself only ever touches `/opt/gstlab`.

## Why this can't disturb the LMS (now that `-p gstlab` is in place)

- **Different directory** (`/opt/gstlab` vs `/opt/peslms`) — `git pull` in
  one never touches the other.
- **Different Compose project name** (`gstlab`, explicit) — containers,
  networks, and volumes are all prefixed `gstlab_*`/`gstlab-*`, entirely
  distinct from whatever the LMS's own stack names itself.
- **Different database** — its own MariaDB container, own volume
  (`gstlab_dbdata`, not shared with the LMS's `dbdata` volume), own
  credentials. MariaDB gets no host port in production, same as the LMS's
  own DB container.
- **Different port** — this stack's nginx binds to `127.0.0.1:8090`
  (vs. the LMS's `8080`).
- **Different subdomain, different host-nginx file** —
  `gstlab.practicaleduskills.com` is a separate `sites-available` file;
  reloading nginx after adding it does not remove or alter the LMS's
  existing `edu.practicaleduskills.com` config.

## Local development

```bash
cd docker
cp .env.example .env
docker compose -p gstlab up -d
```

Visit `http://localhost:8090/home/register` to see it running locally.
