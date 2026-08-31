<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/rate-limit.php';

header('Content-Type: application/json');
header('Cache-Control: no-store');

function respond(bool $ok, string $message = '', int $status = 200): void {
    http_response_code($status);
    echo json_encode(['ok' => $ok, 'message' => $message]);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    respond(false, 'Method not allowed.', 405);
}

if (!rate_limit_same_origin()) {
    respond(false, 'Request rejected.', 403);
}

// Throttled before any file handling so abuse costs as little as possible.
// Two windows: the short one stops bursts, the long one stops a slow drip.
$rateKey = rate_limit_client_key();
if (!rate_limit_allow('upload_burst', $rateKey, 5, 600)
    || !rate_limit_allow('upload_hourly', $rateKey, 20, 3600)) {
    respond(false, 'Too many uploads from this connection. Please wait a few minutes and try again.', 429);
}

if (TELEGRAM_BOT_TOKEN === '' || TELEGRAM_UPLOAD_CHAT_ID === '') {
    error_log('upload-proof.php: TELEGRAM_BOT_TOKEN/TELEGRAM_UPLOAD_CHAT_ID not configured.');
    respond(false, 'Upload is not available right now.', 503);
}

if (empty($_FILES['screenshot']) || $_FILES['screenshot']['error'] !== UPLOAD_ERR_OK || !is_uploaded_file($_FILES['screenshot']['tmp_name'])) {
    respond(false, 'No image was received.', 400);
}

$file = $_FILES['screenshot'];

$maxBytes = 8 * 1024 * 1024;
if ($file['size'] > $maxBytes) {
    respond(false, 'Image is too large (max 8MB).', 413);
}

$mime = mime_content_type($file['tmp_name']);
$allowedMimes = ['image/jpeg' => 'jpg', 'image/png' => 'png', 'image/webp' => 'webp'];
if (!isset($allowedMimes[$mime])) {
    respond(false, 'Please upload a JPEG, PNG, or WebP image.', 415);
}

$platform = $_POST['platform'] ?? '';
$platformLabel = $platform === 'megapari' ? 'MegaPari' : '1xBet';
$accountId = trim($_POST['account_id'] ?? '');

// Same 8-10 digit numeric format the client enforces (see assets/js/proof-upload.js) —
// checked again here since a request can hit this endpoint without running that JS.
if (!preg_match('/^\d{8,10}$/', $accountId)) {
    respond(false, 'Enter a valid account ID (8 to 10 digits) before submitting.', 400);
}

$caption = "New deposit proof\nPlatform: {$platformLabel}\nAccount ID: {$accountId}";

$curlFile = new CURLFile($file['tmp_name'], $mime, 'proof.' . $allowedMimes[$mime]);

$ch = curl_init('https://api.telegram.org/bot' . TELEGRAM_BOT_TOKEN . '/sendPhoto');
curl_setopt_array($ch, [
    CURLOPT_POST => true,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT => 20,
    CURLOPT_POSTFIELDS => [
        'chat_id' => TELEGRAM_UPLOAD_CHAT_ID,
        'caption' => $caption,
        'photo' => $curlFile,
    ],
]);
$result = curl_exec($ch);
$curlError = curl_error($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($result === false || $httpCode !== 200) {
    error_log("upload-proof.php: Telegram send failed. HTTP {$httpCode} curl_error={$curlError} response={$result}");
    respond(false, 'Could not send your screenshot. Please try again.', 502);
}

respond(true);
