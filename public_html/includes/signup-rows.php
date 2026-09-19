<?php
// Direct brand links + promo codes + the "Continue to sign up" CTA. Brands come
// straight from config.php; $rowGame is optional and only decides which
// prediction card the signup flow ends on (see assets/js/signup-form.js).
$gameParam = isset($rowGame) ? '&amp;game=' . urlencode($rowGame) : '';
?>
<div class="signup-rows">
  <?php if (false): ?>
  <?php
  $rowBrandName = '1xBet';
  $rowLogo = '/assets/img/Logo_1xBet.png';
  $rowUrl = ONEXBET_WEBSITE_URL;
  $rowCode = ONEXBET_PROMO_CODE;
  require __DIR__ . '/promo-row.php';

  $rowBrandName = 'MegaPari';
  $rowLogo = '/assets/img/megapari-logo.png';
  $rowUrl = MEGAPARI_WEBSITE_URL;
  $rowCode = MEGAPARI_PROMO_CODE;
  require __DIR__ . '/promo-row.php';
  ?>
  <?php endif; ?>
  <?php
  $rowBrandName = 'Melbet';
  $rowLogo = '/assets/img/melbet.png';
  $rowUrl = MELBET_WEBSITE_URL;
  $rowCode = MELBET_PROMO_CODE;
  require __DIR__ . '/promo-row.php';
  ?>
  <a id="continue-btn" class="btn btn-gradient btn-block" href="/signup.php?platform=melbet<?= $gameParam ?>" data-platform="melbet"><?= htmlspecialchars(t('continue_cta')) ?></a>
</div>
