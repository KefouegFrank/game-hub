// Signup page: Start stays disabled until an ID is entered, and picking a
// different platform pill updates which URL Start sends you to.
(() => {
  const startBtn = document.getElementById('signup-start-btn');
  const idInput = document.getElementById('account-id');
  const pills = document.querySelectorAll('.brand-pill-wide');
  if (!startBtn) return;

  if (idInput) {
    idInput.addEventListener('input', () => {
      startBtn.disabled = idInput.value.trim() === '';
    });
  }

  startBtn.addEventListener('click', () => {
    if (startBtn.disabled) return;
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
