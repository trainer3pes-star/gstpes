# CLAUDE.md

Onboarding doc for Claude Code sessions working on this repo. Read this
first — it captures the full history, decisions, and mistakes made getting
this project live, so a fresh session doesn't have to rediscover them.

## What this project is

A **GST (Indian Goods & Services Tax) portal simulation** for training
students — a near-complete clone of the real government GST portal's UI and
workflows (registration/ARN, GSTR-1/2A/2B/3B/9 returns, ledgers, challans,
TDS/TCS, HSN summaries, etc.), used as a hands-on training lab.

**Origin**: this codebase started life as a completely different, unrelated
e-commerce marketplace (agro inputs — fertilizers/pesticides — under the
name "ASC Journal"). The GST simulation screens
(`application/views/user/*.php`, e.g. `returngstr1online.php`,
`ledger_cashledger.php`, `gst_challan.php`) were built on top of that
leftover e-commerce scaffolding (cart, checkout, wallet, gift-coupons —
still present in routes/views but unused for this purpose). Don't be
surprised by e-commerce-flavored code paths; they're inert baggage, not
part of the training tool.

**Stack**: CodeIgniter 3 (PHP), MySQL/MariaDB, Bootstrap/AdminLTE frontend.
Entirely independent from the Practical EduSkills LMS (Moodle) — separate
codebase, separate repo, separate login system. The only planned
integration point is a "Visit GST Simulation Lab" link on the LMS's login
page (**not yet built** — see Follow-ups).

## Where things live

- **Repo**: `https://github.com/trainer3pes-star/gstpes` — **public**
  (deliberately, to avoid needing SSH deploy keys — see "Security" below
  for why that matters).
- **Local checkout**: `D:\PES LMS\GSTEducationPortal`
- **VPS**: same Hostinger KVM4 box that hosts the LMS
  (`srv1816119.hstgr.cloud`, `200.97.164.252`), deployed to `/opt/gstlab`
  — **completely separate directory/stack from the LMS's `/opt/peslms`**.
- **Live URL**: `https://gstlab.practicaleduskills.com`

## Critical: this VPS also runs the LMS — isolation is not automatic

**Incident that already happened once**: Docker Compose auto-names a
project after the *basename* of the directory it's run from. Both this
repo's and the LMS's compose files live in a folder literally called
`docker/` — so both defaulted to the identical project name `docker`, and
the very first deploy here **replaced the LMS's live production
containers** (container names collided: `docker-php-1`, `docker-nginx-1`,
`docker-mariadb-1` were identical in both stacks). Production Moodle was
briefly down until recovered by re-running the LMS's own `up -d` from
`/opt/peslms/docker`.

**Fixed by**: `COMPOSE_PROJECT_NAME=gstlab` in `docker/.env` (also passed
explicitly as `-p gstlab` on every compose command, belt-and-suspenders).
**Never omit `-p gstlab` / remove `COMPOSE_PROJECT_NAME` from a command run
on this VPS.** See `docs/deployment.md` for the full incident writeup and
the "why this can't disturb the LMS" checklist.

## Database: schema was reverse-engineered, not restored from a dump

There is **no original SQL schema/dump** for this app — only a live
database on a *different*, no-longer-accessible Hostinger shared-hosting
account (the original `application/config/database.php` had credentials
for `a1626en1_gstportal`, a classic cPanel-style account name, now
unreachable). `docker/schema.sql` was built from scratch by reading every
`$this->db->insert/update/select/from/join/where` call across
`application/models/Home_model.php` (2000+ lines) and `Admin_model.php`,
extracting every table/column actually referenced in code.

Known facts about this reconstructed schema:
- 41 tables, idempotent (`CREATE TABLE IF NOT EXISTS`), imported via
  `mariadb ... < docker/schema.sql`.
- `gst_pos` (place-of-supply / Indian states lookup) is seeded with real
  GST state codes — the only table with pre-populated data.
- Includes a **compatibility view** `CREATE OR REPLACE VIEW user AS SELECT
  id, name, email, contact, current_login FROM gst_user;` — this works
  around a real bug in `Home_model::get_taxpayer_info()`, which joins a
  bare `user` table (missing the `gst_` prefix) instead of `gst_user`. This
  fires on nearly every authenticated page load. The view is a stopgap;
  the actual fix is correcting that one line in the model, which hasn't
  been done yet (see Follow-ups).
- Column types are best-effort guesses (money/tax-like names →
  `DECIMAL(15,2)`, `*_id` → `INT`, dates → `DATE`/`DATETIME`, everything
  else → `VARCHAR(255)`/`TEXT`). **If a "column not found" / "table
  doesn't exist" SQL error shows up in production, that's a column the
  static-analysis pass missed — add it via `ALTER TABLE`, don't panic.**
- Several columns exist only because they're `SELECT`ed somewhere but never
  written by any insert/update (dead columns) — harmless, just noise.

## Changes made in this repo (chronological, so you know what's already done)

1. **Dockerized** — wasn't Docker at all originally (plain PHP on shared
   cPanel hosting). Added `docker/` (Dockerfile, compose files, nginx
   config) mirroring the LMS repo's own isolation pattern (prod override
   binds nginx to `127.0.0.1` only, no host port for MariaDB).
2. **Course field on self-registration** — added a required "Which course
   are you learning in Practical EduSkills?" dropdown (BCOM/BBA/MBA/AI BSC)
   to `application/views/user/register.php`, wired through
   `Home::save_user()` and `Home_model::save_user()`, stored as
   `gst_user.course`.
3. **Credentials moved out of source code**:
   - `application/config/database.php` — was hardcoded to a live Hostinger
     DB password in plain text; now reads `DB_HOST`/`DB_USER`/
     `DB_PASSWORD`/`DB_NAME` from environment (`docker/.env`, gitignored).
   - `application/config/config.php` — `base_url` now reads
     `APP_BASE_URL` env var instead of being hardcoded.
   - `Home_model::send_mail()` — **had a live Gmail address + app password
     hardcoded in plain text** (`gsteducationportal@gmail.com` /
     an app password). Moved to `SMTP_USER`/`SMTP_PASS` env vars. **The
     original password was exposed in this repo's public git history
     before the fix landed — it needs to be revoked/regenerated in that
     Google account's App Passwords settings. As of this writing that
     revocation is still pending** (operator said "I'll handle it later" —
     check whether it's been done before assuming the old password is dead).
4. **Light-touch branding** (deliberately *not* a full re-skin): PES logo
   added to the admin panel and the app's own outer chrome (header/
   login/register navbars), favicon, browser tab title, footer "Powered by
   Practical EduSkills" credit, `SITE_NAME` constant updated from the
   leftover "ASC Journal". **The actual simulated GST-portal UI (government
   emblem, red/blue "Government of India" header, the existing "this is a
   simulation..." disclaimer) was deliberately left untouched** — that
   authenticity is the whole training value; re-skinning it would defeat
   the purpose. If asked to "brand this more," check whether that means
   the outer chrome (fine) or the simulation itself (push back / clarify).
5. **Removed leftover cPanel `.user.ini`/`php.ini`** — both set
   `session.save_path` to a cPanel-specific directory
   (`/var/cpanel/php/sessions/ea-php72`) that doesn't exist in Docker.
   Since the container bind-mounts the whole repo as webroot, PHP-FPM's
   per-directory `.user.ini` scanning picked this up automatically and
   broke every request with a session error. Also would have silently
   overridden the container's own `memory_limit`/`upload_max_filesize`.
   Deleted both files; the Dockerfile's own `conf.d/gstportal.ini` already
   covers what's needed.
6. **First admin account** created directly via SQL insert into
   `gst_admin` (`type = 1`, super-admin) — plain-text password (this app's
   admin login does a literal string comparison, not a hash check; that's
   how the original code works, not something introduced here).

## Deployment

See `docs/deployment.md` for full step-by-step. Summary: push to `main` →
`.github/workflows/deploy.yml` SSHes into the VPS, `git pull`s
`/opt/gstlab`, runs `docker compose -p gstlab -f docker-compose.yml -f
docker-compose.prod.yml up -d`. One-time manual steps already done: DNS A
record, host-nginx vhost (`docker/nginx-host/gstlab.practicaleduskills.com.conf`),
Let's Encrypt cert via certbot.

Repo secrets needed on GitHub for the auto-deploy workflow to work
(`VPS_HOST`, `VPS_USER`, `VPS_PORT`, `VPS_SSH_KEY`) — confirm these are set
before assuming pushes to `main` will auto-deploy.

## Security note: this repo is public

Made public deliberately (simplest way for the VPS to `git clone` without
setting up a deploy key) after confirming no secrets belonged in the code —
but two real secrets *did* leak before that was fully true (DB password,
Gmail app password), both now in git history permanently. Treat this repo
as "assume anything ever committed to it is public forever," including old
commits. Don't add real credentials to any file here, ever, even
temporarily — use `docker/.env` (gitignored) or GitHub Actions secrets.

## Follow-ups / known issues (not yet done)

- **Revoke the leaked Gmail app password** (see item 3 above) — confirm
  status before relying on the old password being dead.
- **Fix the `get_taxpayer_info()` bug properly** (bare `user` table
  reference) instead of relying on the compatibility view forever.
- **LMS integration link** ("Visit GST Simulation Lab" button on the LMS
  login page) — planned, not built. Belongs in the LMS repo's
  `theme_practicaleduskills` child theme, as a plain outbound link (no SSO
  — separate logins on each side, by design).
- **Repo bloat**: ~345MB includes a fully vendored, unused AWS SDK
  (`application/aws/`, ~43MB, config still has dummy `"test"` keys — never
  actually wired up), old zip backups (`application/21-views/admin.zip`,
  `libraries.zip`, `dompdf.zip`, `captcha.zip`), and leftover e-commerce
  product images in `uploads/`. None of this blocks functionality; cleanup
  is optional, do it deliberately if asked, not as a drive-by "while I'm
  here" edit.
- **Dead e-commerce routes/views** (cart, wallet, gift-coupon, product
  catalog) from the original codebase are still wired into
  `application/config/routes.php` and `Home.php` — unused by the GST
  simulation, harmless unless someone stumbles onto them.
