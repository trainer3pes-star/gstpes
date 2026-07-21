# Deployment — same Hostinger KVM 4 VPS as the LMS, fully isolated

This app deploys to `/opt/gstlab` on the same VPS that runs the LMS
(`/opt/peslms`). The two are isolated by design — separate directory,
separate Docker Compose project, separate containers, separate database,
separate host port, separate host-nginx vhost/subdomain — so bringing this
stack up, down, or redeploying it can never affect the LMS.

## One-time VPS setup

```bash
ssh deploy@200.97.164.252

# 1. Separate clone, separate directory from the LMS.
sudo mkdir -p /opt/gstlab && sudo chown deploy:deploy /opt/gstlab
git clone https://github.com/trainer3pes-star/gstpes.git /opt/gstlab
cd /opt/gstlab

# 2. Own .env — real DB credentials, never committed.
cp docker/.env.example docker/.env
# edit docker/.env: set real DB_PASSWORD/DB_ROOT_PASSWORD, confirm
# APP_BASE_URL matches the subdomain chosen below.

# 3. Bring up the stack.
cd docker
docker compose -f docker-compose.yml -f docker-compose.prod.yml up -d

# 4. Run the one-time schema change for the course field added to
#    self-registration (see docs/changelog or the registration form):
docker compose -f docker-compose.yml -f docker-compose.prod.yml exec -T mariadb \
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
`/opt/gstlab`, and runs `docker compose up -d` — same secrets
(`VPS_HOST`, `VPS_USER`, `VPS_PORT`, `VPS_SSH_KEY`) as the LMS's own
workflow can be reused since they point at the same VPS, but the workflow
itself only ever touches `/opt/gstlab`.

## Why this can't disturb the LMS

- **Different directory** (`/opt/gstlab` vs `/opt/peslms`) — `git pull` and
  `docker compose` in one never touches the other.
- **Different Docker Compose project** — Compose namespaces containers,
  networks, and volumes by directory name, so `gstlab`'s `php`/`nginx`/
  `mariadb` containers are entirely distinct from the LMS's.
- **Different database** — its own MariaDB container, own volume, own
  credentials. A bad migration or reset here cannot touch Moodle's data.
  MariaDB gets no host port in production, same as the LMS's own DB.
  container.
- **Different port** — this stack's nginx binds to `127.0.0.1:8090`
  (vs. the LMS's `8080`), so there's no port collision even if both were
  brought up/down repeatedly.
- **Different subdomain, different host-nginx file** —
  `gstlab.practicaleduskills.com` is a separate `sites-available` file;
  reloading nginx after adding it does not remove or alter the LMS's
  existing `edu.practicaleduskills.com` config.

## Local development

```bash
cd docker
cp .env.example .env
docker compose up -d
```

Visit `http://localhost:8090/home/register` to see it running locally.
