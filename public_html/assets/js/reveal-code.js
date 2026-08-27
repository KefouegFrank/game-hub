// "Generate activation code" swaps the intro (video + brand picker) for the
// deposit/proof section, then hands the flow over to Next — see
// includes/crash-actions.php.
(() => {
  const generateBtn = document.getElementById('code-reveal-btn');
  const nextBtn = document.getElementById('crash-next-btn');
  const reveal = document.getElementById('crash-reveal');
  const intro = document.getElementById('crash-intro');
  if (!generateBtn || !reveal) return;

  generateBtn.addEventListener('click', () => {
    if (intro) intro.hidden = true;
    reveal.hidden = false;
    generateBtn.setAttribute('disabled', '');
    generateBtn.setAttribute('aria-disabled', 'true');
    if (nextBtn) {
      nextBtn.removeAttribute('disabled');
      nextBtn.removeAttribute('aria-disabled');
    }
    reveal.scrollIntoView({ behavior: 'smooth', block: 'center' });
  });
})();
