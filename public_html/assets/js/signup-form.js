// Signup page. Start unlocks only once the ID matches the 8-10 digit account
// format 1xBet and MegaPari both use (same rule as assets/js/proof-upload.js)
// and a country is picked. Clicking it opens the script-server modal, which
// spins and then reports the server full — the simulation page it would hand
// off to doesn't exist yet. See includes/script-server-modal.php.
(() => {
  const startBtn = document.getElementById('signup-start-btn');
  const idInput = document.getElementById('account-id');
  const idError = document.getElementById('account-id-error');
  const serverSelect = document.getElementById('server-select');
  const modal = document.getElementById('script-server-modal');
  const connectingEl = document.getElementById('script-modal-connecting');
  const busyEl = document.getElementById('script-modal-busy');
  const pills = document.querySelectorAll('.brand-pill-wide');
  if (!startBtn) return;

  const CONNECT_MS = 2600;
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

  function setModalState(state) {
    if (!connectingEl || !busyEl) return;
    const connecting = state === 'connecting';
    connectingEl.hidden = !connecting;
    busyEl.hidden = connecting;
  }

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

    startBtn.disabled = true;
    startBtn.classList.add('is-loading');
    setModalState('connecting');
    if (modal) Modal.open(modal);

    setTimeout(() => {
      startBtn.classList.remove('is-loading');
      setModalState('busy');
      refreshStartState(); // let them try again once it's reported as full
    }, CONNECT_MS);
  });

  pills.forEach((pill) => {
    pill.addEventListener('click', () => {
      pills.forEach((p) => p.classList.remove('active'));
      pill.classList.add('active');
      startBtn.dataset.href = pill.href;
    });
  });
})();
