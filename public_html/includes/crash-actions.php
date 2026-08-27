<?php
// The flow's footer buttons. "Generate" reveals #crash-reveal above them and
// hands over to "Next" — see assets/js/reveal-code.js.
?>
<div class="crash-actions">
  <button type="button" id="code-reveal-btn" class="btn btn-block btn-lg btn-orange"><?= htmlspecialchars(t('generate_code_cta')) ?></button>
  <button type="button" id="crash-next-btn" class="btn btn-block btn-lg btn-green" disabled aria-disabled="true"><?= htmlspecialchars(t('next_label')) ?></button>
</div>
