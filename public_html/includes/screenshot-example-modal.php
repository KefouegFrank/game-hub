<?php
// "See a screenshot example" modal: pills at the bottom crossfade between
// each platform's example image. No real screenshots yet, so each pill shows
// a placeholder + caption — swap in data-example-img once real images exist.
?>
<dialog id="screenshot-example-modal" class="modal-box example-modal" aria-labelledby="screenshot-example-title">
  <button type="button" class="modal-close" data-modal-dismiss aria-label="<?= htmlspecialchars(t('close_label')) ?>">&times;</button>
  <h3 id="screenshot-example-title"><?= htmlspecialchars(t('example_modal_title')) ?></h3>

  <div class="example-modal-frame">
    <img id="example-modal-img" class="example-modal-img" alt="" hidden>
    <div id="example-modal-placeholder" class="example-modal-placeholder">
      <?= icon_image_placeholder() ?>
      <span id="example-modal-caption"><?= htmlspecialchars(t('example_modal_caption_onexbet')) ?></span>
    </div>
  </div>

  <div class="example-modal-pills">
    <button type="button" class="example-pill active" data-platform="onexbet" data-example-img="" data-caption="<?= htmlspecialchars(t('example_modal_caption_onexbet')) ?>">1xBet</button>
    <button type="button" class="example-pill" data-platform="melbet" data-example-img="" data-caption="<?= htmlspecialchars(t('example_modal_caption_melbet')) ?>">Melbet</button>
  </div>
</dialog>
