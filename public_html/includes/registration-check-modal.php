<?php
// Yes/No gate shown before sending someone to signup.php. Bound to whichever
// element has id="continue-btn" — see assets/js/registration-check.js.
// closedby="closerequest": Esc reads as "no", a stray backdrop click doesn't.
?>
<dialog id="registration-check-modal" class="modal-box" closedby="closerequest" aria-labelledby="registration-check-title" aria-describedby="registration-check-body">
  <?= icon_warning('modal-warning-icon') ?>
  <h3 id="registration-check-title"><?= htmlspecialchars(t('reg_check_title')) ?></h3>
  <p id="registration-check-body"><?= htmlspecialchars(t('reg_check_body')) ?></p>
  <form method="dialog" class="modal-yes-no">
    <button class="btn modal-yes" value="yes" autofocus><?= htmlspecialchars(t('yes_label')) ?></button>
    <button class="btn modal-no" value="no"><?= htmlspecialchars(t('no_label')) ?></button>
  </form>
</dialog>
