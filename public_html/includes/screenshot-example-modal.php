<?php
// "See a screenshot example" modal: the sample fills the card, brand pills at
// the bottom crossfade between each platform's example. A brand with no sample
// yet falls back to the placeholder + caption.
$exampleImages = [
    'onexbet' => '/assets/img/1xbet-sample.jpeg',
    'megapari' => '',
];
$exampleActive = $exampleImages['onexbet'];
?>
<dialog id="screenshot-example-modal" class="modal-box example-modal" closedby="any" aria-labelledby="screenshot-example-title">
  <button type="button" class="modal-close example-modal-close" data-modal-close aria-label="<?= htmlspecialchars(t('close_label')) ?>">&times;</button>
  <h3 id="screenshot-example-title" class="visually-hidden"><?= htmlspecialchars(t('example_modal_title')) ?></h3>

  <div class="example-modal-frame">
    <img id="example-modal-img" class="example-modal-img" src="<?= htmlspecialchars($exampleActive) ?>" alt="<?= htmlspecialchars(t('example_modal_caption_onexbet')) ?>"<?= $exampleActive === '' ? ' hidden' : '' ?>>
    <div id="example-modal-placeholder" class="example-modal-placeholder"<?= $exampleActive === '' ? '' : ' hidden' ?>>
      <?= icon_image_placeholder() ?>
      <span id="example-modal-caption"><?= htmlspecialchars(t('example_modal_caption_onexbet')) ?></span>
    </div>
  </div>

  <div class="example-modal-pills">
    <button type="button" class="example-pill brand-megapari" data-platform="megapari" data-example-img="<?= htmlspecialchars($exampleImages['megapari']) ?>" data-caption="<?= htmlspecialchars(t('example_modal_caption_megapari')) ?>">MegaPari</button>
    <button type="button" class="example-pill brand-onexbet active" data-platform="onexbet" data-example-img="<?= htmlspecialchars($exampleImages['onexbet']) ?>" data-caption="<?= htmlspecialchars(t('example_modal_caption_onexbet')) ?>">1xBet</button>
  </div>
</dialog>
