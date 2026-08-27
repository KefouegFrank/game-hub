// "Continue to sign up" opens a Yes/No check before proceeding. The dialog's
// form returns the answer, so Esc and a backdrop click both read as "no".
(() => {
  const continueBtn = document.getElementById('continue-btn');
  const dialog = document.getElementById('registration-check-modal');
  if (!continueBtn || !dialog) return;

  continueBtn.addEventListener('click', (e) => {
    e.preventDefault();
    if (continueBtn.hasAttribute('disabled')) return;
    Modal.open(dialog);
  });

  dialog.addEventListener('close', () => {
    if (dialog.returnValue === 'yes') window.location.href = continueBtn.href;
  });
})();
