<?php
// Yes/No gate shown before sending someone to signup.php. Bound to whichever
// element has id="continue-btn" — see assets/js/registration-check.js.
?>
<dialog id="registration-check-modal" class="modal-box" aria-labelledby="registration-check-title">
  <?= icon_warning('modal-warning-icon') ?>
  <h3 id="registration-check-title"><?= htmlspecialchars(t('reg_check_title')) ?></h3>
  <p><?= htmlspecialchars(t('reg_check_body')) ?></p>
  <div class="modal-yes-no">
    <button type="button" class="btn modal-yes" data-modal-answer="yes"><?= htmlspecialchars(t('yes_label')) ?></button>
    <button type="button" class="btn modal-no" data-modal-answer="no"><?= htmlspecialchars(t('no_label')) ?></button>
  </div>
</dialog>
