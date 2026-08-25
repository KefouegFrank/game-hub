<?php
// Reveal-then-continue step: tap to reveal the real promo code for whichever
// platform is selected in platform-buttons.php, which unlocks #continue-btn.
// Honest by design: the code is always real (from config.php), never a fake
// "unlock"/"activation" code — see assets/js/reveal-code.js.
?>
<p class="plain-intro"><?= htmlspecialchars(t('code_reveal_intro')) ?></p>

<div class="signup-rows">
  <button type="button" id="code-reveal-btn" class="btn btn-gradient btn-block btn-lg" data-code="<?= htmlspecialchars(ONEXBET_PROMO_CODE) ?>" data-label="<?= htmlspecialchars(t('reveal_code_cta')) ?>"><?= htmlspecialchars(t('reveal_code_cta')) ?></button>
</div>

<div class="signup-rows">
  <a id="continue-btn" class="btn btn-gradient btn-block btn-lg" href="<?= htmlspecialchars(ONEXBET_WEBSITE_URL) ?>" data-platform="onexbet" disabled aria-disabled="true"><?= htmlspecialchars(t('continue_cta')) ?></a>
</div>
