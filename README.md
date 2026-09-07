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

Then open http://localhost:8000 in a browser