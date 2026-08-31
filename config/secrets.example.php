<?php
/**
 * Template. Copy to secrets.php and fill in. secrets.php lives OUTSIDE public_html so a PHP handler failure can't
 * serve it as plaintext, and is gitignored so it never reaches history.
 * Copy secrets.example.php to secrets.php on the server and fill it in.
 */

// --- Telegram bot (forwards deposit-proof screenshot uploads) ---
define('TELEGRAM_BOT_TOKEN', '');
define('TELEGRAM_UPLOAD_CHAT_ID', '');

// --- Database (only needed if referral-click tracking is wired up) ---
define('DB_HOST', '');
define('DB_NAME', '');
define('DB_USER', '');
define('DB_PASS', '');
