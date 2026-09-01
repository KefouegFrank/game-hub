# GamesHub (local dev scaffold)

An informational games-info site with affiliate links: explanations of how each
game works, a prediction card per game, and a clearly disclosed affiliate CTA.

## Stack

- PHP 8+ (no framework — plain includes, matches cPanel shared hosting)
- Plain HTML/CSS/JS (no build step)
- No database, no secrets: everything the site reads is committed

## Local development

Requires PHP installed locally (`php -v` to check).

```bash
cd public_html
php -S localhost:8000
```

Then open http://localhost:8000 in a browser.

## Project structure

```
public_html/          -> document root (upload to cPanel's public_html/)
  .htaccess            security headers, blocks includes/ and directory listings
  index.php            homepage
  games/               one page per game (crash.php, apple-of-fortune.php, thimbles.php)
  includes/            shared header/footer/config
  assets/              css, js, images
  lang/                simple JSON translation files
```

Affiliate URLs, promo codes and the deposit amount live in
`public_html/includes/config.php`.

## Deploying to cPanel (Asura hosting)

1. Upload the contents of `public_html/` into cPanel's `public_html/`. Include the
   `.htaccess` — File Manager hides dotfiles until you enable "Show Hidden Files".
2. Enable AutoSSL in cPanel for HTTPS, then uncomment the HTTPS redirect and the
   `Strict-Transport-Security` header in `public_html/.htaccess`.

### Verifying the deployment

```bash
curl -sI https://your-domain/ | grep -i 'content-security-policy\|x-frame-options'
curl -s -o /dev/null -w '%{http_code}\n' https://your-domain/includes/config.php   # expect 404
curl -s -o /dev/null -w '%{http_code}\n' https://your-domain/assets/                # expect 403/404, not a listing
```


