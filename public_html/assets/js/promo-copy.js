// Click a promo code to copy it, with brief "Copied!" feedback.
(() => {
  document.querySelectorAll('.promo-code').forEach((btn) => {
    btn.addEventListener('click', () => {
      const code = btn.dataset.code;
      navigator.clipboard.writeText(code).then(() => {
        // Icon-only buttons have nothing to swap, so they just flash the class.
        const original = btn.dataset.copiedText ? btn.textContent : null;
        if (original !== null) btn.textContent = btn.dataset.copiedText;
        btn.classList.add('copied');
        setTimeout(() => {
          if (original !== null) btn.textContent = original;
          btn.classList.remove('copied');
        }, 1500);
      });
    });
  });
})();
