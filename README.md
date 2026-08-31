# GamesHub (local dev scaffold)

An informational games-info site with affiliate links. 
activation codes,  deposit-proof gating — just explanations of how each game works
plus a clearly disclosed affiliate CTA.

## Stack

- PHP 8+ (no framework — plain includes, matches cPanel shared hosting)
- Plain HTML/CSS/JS (no build step)
- MySQL (optional — only needed if you want to log affiliate-link clicks)

## Local development

Requires PHP installed locally (`php -v` to check).

```bash
cd public_html
php -S localhost:8000
```

Then open http://localhost:8000 in a browser.

## Optional: local database

If you want referral-click tracking, create a database and import the schema:

```bash
mysql -u root -e "CREATE DATABASE gameshub"
mysql -u root gameshub < ../db/schema.sql
```

Credentials (Telegram bot token, DB login) go in `config/secrets.php`, which sits
**outside** the web root and is gitignored. Copy the template to start:

```bash
cp config/secrets.example.php config/secrets.php
```

Everything non-secret (affiliate URLs, promo codes, deposit amount) stays in
`public_html/includes/config.php`, which is safe to commit.

## Project structure

```
public_html/          -> document root (upload to cPanel's public_html/)
  .htaccess            security headers, blocks includes/ and directory listings
  index.php            homepage
  games/               one page per game (crash.php, apple-of-fortune.php, thimbles.php)
  includes/            shared header/footer/config
  assets/              css, js, images
  lang/                simple JSON translation files
config/               -> MUST live outside the web root
  secrets.php          real credentials (gitignored, never uploaded to public_html/)
  secrets.example.php  template
storage/              -> outside the web root; rate-limit counters, auto-created
db/
  schema.sql           optional MySQL schema for click tracking
```

## Deploying to cPanel (Asura hosting)

1. Upload the contents of `public_html/` into cPanel's `public_html/`. Include the
   `.htaccess` — File Manager hides dotfiles until you enable "Show Hidden Files".
2. Upload `config/` to your **home directory**, i.e. as a sibling of `public_html/`,
   never inside it. The layout the app expects:

   ```
   /home/<cpanel-user>/
     config/secrets.php     <- credentials, not web-reachable
     public_html/           <- document root
   ```

   Copy `secrets.example.php` to `secrets.php` there and fill in the Telegram bot
   token and chat ID. Set it to `chmod 600`. If this file is missing the site still
   renders, but the upload endpoint reports itself unavailable.
3. Create a MySQL database + user in cPanel if you're using click tracking, and put
   those credentials in `config/secrets.php` too.
4. Enable AutoSSL in cPanel for HTTPS, then uncomment the HTTPS redirect and the
   `Strict-Transport-Security` header in `public_html/.htaccess`.
5. Behind Cloudflare, add `define('TRUST_CLOUDFLARE_IP', true);` to `config/secrets.php`
   so the upload rate limiter reads the visitor's IP instead of Cloudflare's edge.

### Verifying the deployment

```bash
curl -sI https://your-domain/ | grep -i 'content-security-policy\|x-frame-options'
curl -s -o /dev/null -w '%{http_code}\n' https://your-domain/includes/config.php   # expect 404
curl -s -o /dev/null -w '%{http_code}\n' https://your-domain/assets/                # expect 403/404, not a listing
```


