// Crash-style unlock step: reveals the real promo code for the selected
// platform (see platform-buttons.php's data-code) and unlocks #continue-btn.
// The code itself is never fake — this only gates *when* it's shown.
(() => {
  const btn = document.getElementById('code-reveal-btn');
  const continueBtn = document.getElementById('continue-btn');
  if (!btn || !continueBtn) return;

  btn.addEventListener('click', () => {
    if (btn.classList.contains('revealed')) return;
    const code = btn.dataset.code;
    if (navigator.clipboard) navigator.clipboard.writeText(code).catch(() => {});
    btn.textContent = code;
    btn.classList.add('revealed');
    continueBtn.removeAttribute('disabled');
    continueBtn.removeAttribute('aria-disabled');
  });
})();
