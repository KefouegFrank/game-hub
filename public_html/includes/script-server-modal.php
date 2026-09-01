<?php
// Two-state modal for the Start button on signup.php: spins while it tries the
// script server, then reports the server full. Driven by assets/js/signup-form.js.
// closedby="any" so the failure state is easy to dismiss.
?>
<dialog id="script-server-modal" class="modal-box script-modal" closedby="any" aria-labelledby="script-modal-title">
  <div class="script-modal-connecting" id="script-modal-connecting">
    <span class="spinner-ring" aria-hidden="true"></span>
    <p class="script-modal-connecting-text"><?= htmlspecialchars(t('script_connecting')) ?></p>
  </div>

  <div class="script-modal-busy" id="script-modal-busy" hidden>
    <?= icon_warning('modal-warning-icon') ?>
    <h3 id="script-modal-title"><?= htmlspecialchars(t('script_busy_title')) ?></h3>
    <p><?= htmlspecialchars(t('script_busy_text')) ?></p>
    <button type="button" class="btn btn-block modal-dismiss-btn" data-modal-close autofocus><?= htmlspecialchars(t('close_label')) ?></button>
  </div>
</dialog>
