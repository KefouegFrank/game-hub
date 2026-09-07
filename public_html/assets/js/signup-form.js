// Signup page. Start unlocks only once the ID matches the 8-10 digit account
// format 1xBet and MegaPari both use, and a country is picked, then goes
// straight to the prediction card.
(() => {
  const startBtn = document.getElementById('signup-start-btn');
  const idInput = document.getElementById('account-id');
  const idError = document.getElementById('account-id-error');
  const serverSelect = document.getElementById('server-select');
  const pills = document.querySelectorAll('.brand-pill-wide');
  if (!startBtn) return;

  const TOOLKIT_URL = startBtn.dataset.toolkit || '/script.php';

  const ID_PATTERN = /^\d{8,10}$/;
  const isIdValid = () => !!idInput && ID_PATTERN.test(idInput.value.trim());
  const hasCountry = () => !!serverSelect && serverSelect.value !== '';
  const canStart = () => isIdValid() && hasCountry();

  function setIdError(show) {
    if (!idInput) return;
    idInput.classList.toggle('field-invalid', show);
    idInput.setAttribute('aria-invalid', show ? 'true' : 'false');
    if (idError) idError.hidden = !show;
  }

  function refreshStartState() {
    startBtn.disabled = !canStart();
  }

  let idTouched = false;

  if (idInput) {
    idInput.addEventListener('blur', () => {
      idTouched = true;
      setIdError(idInput.value.trim() !== '' && !isIdValid());
    });
    idInput.addEventListener('input', () => {
      refreshStartState();
      if (idTouched) setIdError(idInput.value.trim() !== '' && !isIdValid());
    });
  }

  // Nothing here posts anywhere; Enter in a field must not reload the page.
  const form = document.getElementById('signup-form');
  if (form) form.addEventListener('submit', (e) => e.preventDefault());

  if (serverSelect) serverSelect.addEventListener('change', refreshStartState);
  refreshStartState();

  startBtn.addEventListener('click', () => {
    if (!canStart()) {
      if (!isIdValid()) {
        idTouched = true;
        setIdError(true);
        idInput.focus();
      } else if (serverSelect) {
        serverSelect.focus();
      }
      return;
    }

    // Spinner stays up for the navigation itself; no artificial delay.
    startBtn.disabled = true;
    startBtn.classList.add('is-loading');
    window.location.href = TOOLKIT_URL;
  });

  pills.forEach((pill) => {
    pill.addEventListener('click', () => {
      pills.forEach((p) => p.classList.remove('active'));
      pill.classList.add('active');
      startBtn.dataset.href = pill.href;
    });
  });
})();
