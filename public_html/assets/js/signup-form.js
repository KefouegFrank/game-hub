// Signup page: Start stays disabled until the ID matches the 8-10 digit
// account-number format 1xBet and MegaPari both use (same format enforced in
// assets/js/proof-upload.js), and picking a different platform pill updates
// which URL Start sends you to.
(() => {
  const startBtn = document.getElementById('signup-start-btn');
  const idInput = document.getElementById('account-id');
  const idError = document.getElementById('account-id-error');
  const pills = document.querySelectorAll('.brand-pill-wide');
  if (!startBtn) return;

  const ID_PATTERN = /^\d{8,10}$/;
  const isIdValid = () => !!idInput && ID_PATTERN.test(idInput.value.trim());

  function setIdError(show) {
    if (!idInput) return;
    idInput.classList.toggle('field-invalid', show);
    idInput.setAttribute('aria-invalid', show ? 'true' : 'false');
    if (idError) idError.hidden = !show;
  }

  let idTouched = false;

  if (idInput) {
    startBtn.disabled = true;

    idInput.addEventListener('blur', () => {
      idTouched = true;
      setIdError(idInput.value.trim() !== '' && !isIdValid());
    });
    idInput.addEventListener('input', () => {
      startBtn.disabled = !isIdValid();
      if (idTouched) setIdError(idInput.value.trim() !== '' && !isIdValid());
    });
  }

  startBtn.addEventListener('click', () => {
    if (!isIdValid()) {
      idTouched = true;
      setIdError(true);
      idInput.focus();
      return;
    }
    window.location.href = startBtn.dataset.href;
  });

  pills.forEach((pill) => {
    pill.addEventListener('click', () => {
      pills.forEach((p) => p.classList.remove('active'));
      pill.classList.add('active');
      startBtn.dataset.href = pill.href;
    });
  });
})();
