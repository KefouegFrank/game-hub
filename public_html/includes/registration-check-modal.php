<?php
// Yes/No gate shown before sending someone to signup.php. Bound to whichever
// element has id="continue-btn" — see assets/js/registration-check.js.
?>
<dialog id="registration-check-modal" class="modal-box" aria-labelledby="registration-check-title">
  <svg class="modal-warning-icon" viewBox="0 0 24 24" fill="none" stroke="#f59e0b" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
    <path d="M12 3 2 20h20L12 3Z" />
    <path d="M12 10v4" />
    <circle cx="12" cy="17" r="0.5" fill="#f59e0b" />
  </svg>
  <h3 id="registration-check-title"><?= htmlspecialchars(t('reg_check_title')) ?></h3>
  <p><?= htmlspecialchars(t('reg_check_body')) ?></p>
  <div class="modal-yes-no">
    <button type="button" class="btn modal-yes" data-modal-answer="yes"><?= htmlspecialchars(t('yes_label')) ?></button>
    <button type="button" class="btn modal-no" data-modal-answer="no"><?= htmlspecialchars(t('no_label')) ?></button>
  </div>
</dialog>
