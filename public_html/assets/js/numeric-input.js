// Digits-only fields. Typed letters are blocked outright via beforeinput; the
// input handler is the backstop for text that arrives by paste, drop, or
// autofill, where beforeinput doesn't always carry the data.
//
// Loaded before the scripts that validate these fields, so their input handlers
// always read an already-cleaned value.
(() => {
  document.querySelectorAll('input[inputmode="numeric"]').forEach((input) => {
    input.addEventListener('beforeinput', (e) => {
      if (typeof e.data === 'string' && /\D/.test(e.data)) e.preventDefault();
    });

    input.addEventListener('input', () => {
      const clean = input.value.replace(/\D/g, '');
      if (clean === input.value) return;

      // Put the caret back where it was, minus whatever got stripped ahead of it.
      const caret = input.selectionStart ?? input.value.length;
      const strippedBefore = input.value.slice(0, caret).replace(/\d/g, '').length;
      input.value = clean;
      const next = Math.max(0, caret - strippedBefore);
      input.setSelectionRange(next, next);
    });
  });
})();
