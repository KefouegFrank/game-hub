<?php
// "Registration Guide" link. One button — the reference layout this is based
// on hardcodes 4 language variants side by side; t() already handles that.
?>
<div class="signup-rows guide-cta-row">
  <a class="btn btn-gradient btn-block btn-lg" href="<?= htmlspecialchars(TUTORIAL_VIDEO_URL) ?>"<?= TUTORIAL_VIDEO_URL === '#' ? '' : ' target="_blank" rel="noopener"' ?>>
    <?= htmlspecialchars(t('registration_guide_cta')) ?>
  </a>
</div>
