<?php
// "How to Play" link. Set $guideGame ('apple' or 'crash') before including so
// the guide page knows which game's screenshots and step 2 caption to show.
$guideHref = '/registration-guide.php' . (isset($guideGame) ? '?game=' . urlencode($guideGame) : '');
?>
<div class="signup-rows guide-cta-row">
  <a class="btn btn-gradient btn-block btn-lg" href="<?= htmlspecialchars($guideHref) ?>">
    <?= htmlspecialchars(t('registration_guide_cta')) ?>
  </a>
</div>
