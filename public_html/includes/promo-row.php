<?php
// One "arrow + brand pill + promo code" row. Set $rowBrandName, $rowLogo,
// $rowUrl, $rowCode before including; $rowCompact swaps the Copy button for a
// clipboard icon. Reused by signup-rows.php and the crash/thimbles game pages.
$rowCompact = $rowCompact ?? false;
?>
<div class="signup-row">
  <img class="pointer-icon" src="/assets/img/emoji-point-right.svg" alt="">
  <a class="brand-pill" href="<?= htmlspecialchars($rowUrl) ?>"<?= $rowUrl === '#' ? '' : ' target="_blank" rel="noopener"' ?>>
    <img src="<?= htmlspecialchars($rowLogo) ?>" alt="<?= htmlspecialchars($rowBrandName) ?>">
    <span class="chevron">›</span>
  </a>
  <span class="promo-pill">
    <span class="promo-pill-label"><?= htmlspecialchars(t('promo_code_label')) ?>:
      <?php if ($rowCode !== ''): ?><strong><?= htmlspecialchars($rowCode) ?></strong><?php else: ?><strong><?= htmlspecialchars(t('coming_soon')) ?></strong><?php endif; ?>
    </span>
    <?php if ($rowCode !== ''): ?>
      <?php if ($rowCompact): ?>
        <button type="button" class="promo-code promo-code-icon" data-code="<?= htmlspecialchars($rowCode) ?>" aria-label="<?= htmlspecialchars(t('copy_code_label')) ?>"><?= icon_clipboard() ?></button>
      <?php else: ?>
        <button type="button" class="promo-code" data-code="<?= htmlspecialchars($rowCode) ?>" data-copied-text="<?= htmlspecialchars(t('copied_label')) ?>"><?= htmlspecialchars(t('copy_label')) ?></button>
      <?php endif; ?>
    <?php endif; ?>
  </span>
</div>
