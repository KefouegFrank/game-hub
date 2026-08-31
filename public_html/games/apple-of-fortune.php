<?php
require_once __DIR__ . '/../includes/config.php';
$pageTitle = 'Apple of Fortune — how it works | ' . SITE_NAME;
require __DIR__ . '/../includes/header.php';
?>

<?php
$gameMediaAlt = 'Registration walkthrough video';
require __DIR__ . '/../includes/game-media.php';
require __DIR__ . '/../includes/platform-buttons.php';
require __DIR__ . '/../includes/pre-play-callout.php';
?>

<?php require __DIR__ . '/../includes/signup-callout.php'; ?>

<?php
require __DIR__ . '/../includes/signup-rows.php';
require __DIR__ . '/../includes/registration-check-modal.php';
?>

<?php require __DIR__ . '/../includes/registration-guide-cta.php'; ?>

<?php require __DIR__ . '/../includes/game-carousel.php'; ?>

<?php require __DIR__ . '/../includes/footer.php'; ?>
