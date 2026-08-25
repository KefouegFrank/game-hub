// Swaps the platform-picker view for the deposit-proof panel — see
// includes/deposit-proof-panel.php. Not a modal or navigation, just
// hiding one section and showing its sibling.
(() => {
  const btn = document.getElementById('code-reveal-btn');
  const before = document.getElementById('reveal-section-before');
  const after = document.getElementById('reveal-section-after');
  if (!btn || !before || !after) return;

  btn.addEventListener('click', () => {
    before.hidden = true;
    after.hidden = false;
    after.scrollIntoView({ behavior: 'smooth', block: 'start' });
  });
})();
