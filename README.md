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

Update `public_html/includes/config.php` with your local DB credentials.

## Project structure

```
public_html/          -> document root (this is what you'd upload to cPanel's public_html/)
  index.php            homepage
  scrip/               one page per game (crash.php, apple-of-fortune.php, thimbles.php)
  includes/            shared header/footer/config
  assets/              css, js, images
  lang/                simple JSON translation files
db/
  schema.sql           optional MySQL schema for click tracking
```

## Deploying to cPanel (Asura hosting)

1. Zip the contents of `public_html/` and upload via cPanel File Manager, or push via Git
   if your plan supports it.
2. Create a MySQL database + user in cPanel if you're using click tracking, and update
   `config.php` with the real credentials (don't commit real credentials to git).
3. Enable AutoSSL in cPanel for HTTPS.


