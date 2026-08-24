// Click a promo code to copy it, with brief "Copied!" feedback.
(() => {
  document.querySelectorAll('.promo-code').forEach((btn) => {
    btn.addEventListener('click', () => {
      const code = btn.dataset.code;
      navigator.clipboard.writeText(code).then(() => {
        const original = btn.textContent;
        btn.textContent = btn.dataset.copiedText || original;
        btn.classList.add('copied');
        setTimeout(() => {
          btn.textContent = original;
          btn.classList.remove('copied');
        }, 1500);
      });
    });
  });
})();
