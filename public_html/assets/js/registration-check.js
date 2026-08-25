// "Continue to sign up" opens a Yes/No check before proceeding.
// No: stay on the page. Yes: move on to the signup-info page for the selected platform.
(() => {
  const continueBtn = document.getElementById('continue-btn');
  const dialog = document.getElementById('registration-check-modal');
  if (!continueBtn || !dialog) return;

  continueBtn.addEventListener('click', (e) => {
    e.preventDefault();
    if (continueBtn.hasAttribute('disabled')) return;
    dialog.showModal();
  });

  dialog.querySelectorAll('[data-modal-answer]').forEach((btn) => {
    btn.addEventListener('click', () => {
      dialog.close();
      if (btn.dataset.modalAnswer === 'yes') {
        const platform = continueBtn.dataset.platform || 'onexbet';
        window.location.href = '/signup.php?platform=' + encodeURIComponent(platform);
      }
    });
  });

  initDialogDismiss(dialog);
})();
