<?php
// One "arrow + brand pill + promo code" row. Set $rowBrandName, $rowLogo,
// $rowUrl, $rowCode before including. Reused by signup-rows.php and
// deposit-proof-panel.php.
?>
<div class="signup-row">
  <img class="pointer-icon" src="/assets/img/emoji-point-right.svg" alt="">
  <a class="brand-pill" href="<?= htmlspecialchars($rowUrl) ?>"<?= $rowUrl === '#' ? '' : ' target="_blank" rel="noopener"' ?>>
    <img src="<?= htmlspecialchars($rowLogo) ?>" alt="<?= htmlspecialchars($rowBrandName) ?>">
    <span class="chevron">›</span>
  </a>
  <span class="promo-pill"><?= htmlspecialchars(t('promo_code_label')) ?>:
    <?php if ($rowCode !== ''): ?>
      <button type="button" class="promo-code" data-code="<?= htmlspecialchars($rowCode) ?>" data-copied-text="<?= htmlspecialchars(t('copied_label')) ?>"><?= htmlspecialchars($rowCode) ?></button>
    <?php else: ?>
      <strong><?= htmlspecialchars(t('coming_soon')) ?></strong>
    <?php endif; ?>
  </span>
</div>
