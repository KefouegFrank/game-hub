<?php
require_once __DIR__ . '/includes/config.php';

header('Content-Type: application/json');

function respond(bool $ok, string $message = ''): void {
    echo json_encode(['ok' => $ok, 'message' => $message]);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    respond(false, 'Method not allowed.');
}

if (TELEGRAM_BOT_TOKEN === '' || TELEGRAM_UPLOAD_CHAT_ID === '') {
    error_log('upload-proof.php: TELEGRAM_BOT_TOKEN/TELEGRAM_UPLOAD_CHAT_ID not configured.');
    respond(false, 'Upload is not available right now.');
}

if (empty($_FILES['screenshot']) || $_FILES['screenshot']['error'] !== UPLOAD_ERR_OK || !is_uploaded_file($_FILES['screenshot']['tmp_name'])) {
    respond(false, 'No image was received.');
}

$file = $_FILES['screenshot'];

$maxBytes = 8 * 1024 * 1024;
if ($file['size'] > $maxBytes) {
    respond(false, 'Image is too large (max 8MB).');
}

$mime = mime_content_type($file['tmp_name']);
$allowedMimes = ['image/jpeg' => 'jpg', 'image/png' => 'png', 'image/webp' => 'webp'];
if (!isset($allowedMimes[$mime])) {
    respond(false, 'Please upload a JPEG, PNG, or WebP image.');
}

$platform = $_POST['platform'] ?? '';
$platformLabel = $platform === 'megapari' ? 'MegaPari' : '1xBet';
$accountId = trim($_POST['account_id'] ?? '');

$caption = "New deposit proof\nPlatform: {$platformLabel}";
if ($accountId !== '') {
    $caption .= "\nAccount ID: {$accountId}";
}

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
    respond(false, 'Could not send your screenshot. Please try again.');
}

respond(true);
