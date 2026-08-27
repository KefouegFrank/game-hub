<?php
require_once __DIR__ . '/../includes/config.php';
$pageTitle = 'Crash — how it works | ' . SITE_NAME;
require __DIR__ . '/../includes/header.php';
?>

<section class="crash-flow">
  <div id="crash-intro">
    <?php require __DIR__ . '/../includes/whatsapp-strip.php'; ?>
    <?php
    $gameMediaSrc = MEGAPARI_APP_VIDEO;
    $gameMediaFixed = 'portrait';
    $gameMediaAlt = 'Registration walkthrough video';
    require __DIR__ . '/../includes/game-media.php';
    require __DIR__ . '/../includes/brand-buttons.php';
    ?>

    <h2 class="crash-welcome"><?= htmlspecialchars(t('crash_welcome')) ?></h2>
  </div>

  <div id="crash-reveal" hidden>
    <?php require __DIR__ . '/../includes/deposit-proof-panel.php'; ?>
  </div>

  <?php require __DIR__ . '/../includes/crash-actions.php'; ?>
</section>

<?php require __DIR__ . '/../includes/registration-guide-cta.php'; ?>


<?php require __DIR__ . '/../includes/game-carousel.php'; ?>

<?php require __DIR__ . '/../includes/footer.php'; ?>
