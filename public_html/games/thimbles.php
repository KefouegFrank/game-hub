<?php
require_once __DIR__ . '/../includes/config.php';
$pageTitle = 'Thimbles — how it works | ' . SITE_NAME;
require __DIR__ . '/../includes/header.php';
?>

<section class="game-flow">
  <?php
  $gameMediaSrc = MEGAPARI_APP_VIDEO;
  $gameMediaFixed = 'portrait';
  $gameMediaPoster = t('thimbles_video_title');
  $gameMediaAlt = t('thimbles_video_title');
  require __DIR__ . '/../includes/game-media.php';
  require __DIR__ . '/../includes/brand-buttons.php';
  ?>

  <p class="game-flow-intro"><?= htmlspecialchars(t('thimbles_intro')) ?></p>

  <div class="callout-warn">
    <?= icon_warning() ?>
    <span><strong><?= htmlspecialchars(t('important_label')) ?>:</strong>
      <?= sprintf(htmlspecialchars(t('deposit_note')), '<strong dir="ltr">' . htmlspecialchars(DEPOSIT_AMOUNT) . '</strong>') ?></span>
  </div>

  <div class="signup-rows">
    <?php
    $rowCompact = true;

    $rowBrandName = 'MegaPari';
    $rowLogo = '/assets/img/megapari-logo.png';
    $rowUrl = MEGAPARI_WEBSITE_URL;
    $rowCode = MEGAPARI_PROMO_CODE;
    require __DIR__ . '/../includes/promo-row.php';

    $rowBrandName = '1xBet';
    $rowLogo = '/assets/img/Logo_1xBet.png';
    $rowUrl = ONEXBET_WEBSITE_URL;
    $rowCode = ONEXBET_PROMO_CODE;
    require __DIR__ . '/../includes/promo-row.php';
    ?>
  </div>

  <a id="continue-btn" class="btn btn-blue game-flow-next" href="/signup.php?platform=megapari&amp;game=thimbles" data-platform="megapari"><?= htmlspecialchars(t('next_label')) ?></a>
</section>

<?php require __DIR__ . '/../includes/registration-check-modal.php'; ?>


<?php require __DIR__ . '/../includes/registration-guide-cta.php'; ?>

<?php require __DIR__ . '/../includes/game-carousel.php'; ?>

<?php require __DIR__ . '/../includes/footer.php'; ?>
