<?php
// Direct brand links + promo codes + the "Continue to sign up" CTA.
// No params — reads the platform constants straight from config.php.
?>
<div class="signup-rows">
  <?php
  $rowBrandName = '1xBet';
  $rowLogo = '/assets/img/Logo_1xBet.png';
  $rowUrl = ONEXBET_WEBSITE_URL;
  $rowCode = ONEXBET_PROMO_CODE;
  require __DIR__ . '/promo-row.php';

  $rowBrandName = 'Melbet';
  $rowLogo = '/assets/img/mailbet-logo.png';
  $rowUrl = MELBET_WEBSITE_URL;
  $rowCode = MELBET_PROMO_CODE;
  require __DIR__ . '/promo-row.php';
  ?>
  <a id="continue-btn" class="btn btn-gradient btn-block" href="<?= htmlspecialchars(ONEXBET_WEBSITE_URL) ?>" data-platform="onexbet"><?= htmlspecialchars(t('continue_cta')) ?></a>
</div>
