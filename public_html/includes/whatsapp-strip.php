<?php
// Channel call-out above the crash flow. A WhatsApp channel invite ends in an
// opaque id, so this shows the CTA rather than the URL the way a handle would.
?>
<?php if (WHATSAPP_URL !== '#'): ?>
  <a class="whatsapp-strip" href="<?= htmlspecialchars(WHATSAPP_URL) ?>" target="_blank" rel="noopener">
    <?= icon_whatsapp() ?>
    <strong><?= htmlspecialchars(t('whatsapp_cta')) ?></strong>
  </a>
<?php endif; ?>
