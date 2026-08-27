<?php
// Section B of the crash flow: what to deposit, both brands' promo codes, and
// the deposit-proof upload form (see assets/js/proof-upload.js and
// public_html/upload-proof.php).
?>
<div class="deposit-warning">
  <?= icon_warning() ?>
  <span><?= sprintf(htmlspecialchars(t('deposit_warning_text')), '<strong class="deposit-amount">' . htmlspecialchars(DEPOSIT_AMOUNT) . '</strong>') ?></span>
</div>

<div class="signup-rows">
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
</div>

<div id="proof-form-panel" class="proof-panel">
  <h2 class="proof-panel-heading"><?= htmlspecialchars(t('select_infos_heading')) ?></h2>

  <div class="platform-tile-picker">
    <button type="button" class="platform-tile active" data-platform="onexbet">
      <img src="/assets/img/Logo_1xBet.png" alt="1xBet">
      <span>1xBet</span>
    </button>
    <button type="button" class="platform-tile" data-platform="megapari">
      <img src="/assets/img/megapari-logo.png" alt="MegaPari">
      <span>MegaPari</span>
    </button>
  </div>

  <div class="proof-field">
    <label for="proof-account-id" class="proof-field-label"><?= htmlspecialchars(t('deposit_id_label')) ?>:</label>
    <input type="text" id="proof-account-id" class="field-input" placeholder="1670000000">
  </div>

  <p class="proof-upload-instruction">
    <?= htmlspecialchars(t('upload_instruction')) ?>
    <img class="pointer-icon pointer-icon-down" src="/assets/img/emoji-point-right.svg" alt="">
  </p>

  <button type="button" id="example-modal-open-btn" class="btn proof-example-btn" data-modal-open="#screenshot-example-modal"><?= htmlspecialchars(t('see_example_cta')) ?></button>

  <label class="btn upload-btn" for="proof-file-input">
    <?= icon_upload() ?>
    <?= htmlspecialchars(t('upload_image_cta')) ?>
  </label>
  <input type="file" id="proof-file-input" accept="image/*" hidden>

  <div class="proof-upload-box" id="proof-upload-box" hidden>
    <img id="proof-preview" class="proof-preview" alt="" hidden>
    <button type="button" id="proof-remove-btn" class="proof-remove-btn" hidden aria-label="<?= htmlspecialchars(t('remove_image_label')) ?>">&times;</button>
  </div>

  <button type="button" id="proof-submit-btn" class="btn btn-gradient btn-block btn-lg" hidden disabled aria-disabled="true"><?= htmlspecialchars(t('upload_submit_cta')) ?></button>

  <p id="proof-status" class="proof-status" hidden data-success-text="<?= htmlspecialchars(t('upload_success_text')) ?>" data-error-text="<?= htmlspecialchars(t('upload_error_text')) ?>"></p>
</div>

<?php require __DIR__ . '/screenshot-example-modal.php'; ?>
