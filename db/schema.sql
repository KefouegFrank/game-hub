-- Optional schema, only needed if you want to track affiliate-link clicks.
-- Import via phpMyAdmin on your cPanel MySQL database, or locally via:
--   mysql -u root gameshub < db/schema.sql

CREATE TABLE IF NOT EXISTS referral_clicks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    game_slug VARCHAR(64) NOT NULL,
    clicked_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    referrer VARCHAR(255) NULL
);
