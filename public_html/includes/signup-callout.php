<?php
// Banner above the signup rows: what to enter and what to deposit. When the two
// brands don't share a promo code the line claiming one is dropped, so the
// %1$s placeholder has to stay on a line of its own in every translation.
$calloutCode = ONEXBET_PROMO_CODE === MEGAPARI_PROMO_CODE ? ONEXBET_PROMO_CODE : '';
$calloutLines = explode("\n", htmlspecialchars(t('signup_callout')));
if ($calloutCode === '') {
    $calloutLines = array_filter($calloutLines, fn($line) => !str_contains($line, '%1$s'));
}
$calloutText = sprintf(
    implode("\n", $calloutLines),
    '<strong class="callout-code">' . htmlspecialchars($calloutCode) . '</strong>',
    '<strong class="callout-amount">' . htmlspecialchars(DEPOSIT_AMOUNT) . '</strong>'
);
?>
<div class="callout-box callout-signup">
  <p><?= nl2br($calloutText) ?></p>
</div>
