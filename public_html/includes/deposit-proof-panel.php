<?php
// Section B: shown after "Reveal bonus code" swaps away #reveal-section-before.
// Both brands' promo codes, plus the deposit-proof upload form
// (see assets/js/proof-upload.js and public_html/upload-proof.php).
?>
<div class="deposit-warning">
  <?= icon_warning() ?>
  <span><?= htmlspecialchars(t('deposit_warning_text')) ?></span>
</div>

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
</div>

<div id="proof-form-panel" class="proof-panel">
  <h2 class="proof-panel-heading"><?= htmlspecialchars(t('select_infos_heading')) ?></h2>

  <div class="platform-tile-picker">
    <button type="button" class="platform-tile active" data-platform="onexbet">
      <img src="/assets/img/Logo_1xBet.png" alt="1xBet">
      <span>1xBet</span>
    </button>
    <button type="button" class="platform-tile" data-platform="melbet">
      <img src="/assets/img/mailbet-logo.png" alt="Melbet">
      <span>Melbet</span>
    </button>
  </div>

  <label for="proof-account-id" class="proof-field-label"><?= htmlspecialchars(t('deposit_id_label')) ?></label>
  <input type="text" id="proof-account-id" class="field-input" placeholder="1670000000">

  <p class="proof-upload-instruction"><?= htmlspecialchars(t('upload_instruction')) ?></p>

  <button type="button" id="example-modal-open-btn" class="btn proof-example-btn"><?= htmlspecialchars(t('see_example_cta')) ?></button>

  <div class="proof-upload-box">
    <img id="proof-preview" class="proof-preview" alt="" hidden>
    <div id="proof-upload-placeholder" class="proof-upload-placeholder"><?= icon_image_placeholder() ?></div>
    <button type="button" id="proof-remove-btn" class="proof-remove-btn" hidden aria-label="<?= htmlspecialchars(t('remove_image_label')) ?>">&times;</button>
  </div>

  <label class="btn upload-btn" for="proof-file-input">
    <?= icon_upload() ?>
    <?= htmlspecialchars(t('upload_image_cta')) ?>
  </label>
  <input type="file" id="proof-file-input" accept="image/*" hidden>

  <button type="button" id="proof-submit-btn" class="btn btn-gradient btn-block btn-lg" disabled aria-disabled="true"><?= htmlspecialchars(t('upload_submit_cta')) ?></button>

  <p id="proof-status" class="proof-status" hidden data-success-text="<?= htmlspecialchars(t('upload_success_text')) ?>" data-error-text="<?= htmlspecialchars(t('upload_error_text')) ?>"></p>
</div>

<?php require __DIR__ . '/screenshot-example-modal.php'; ?>
