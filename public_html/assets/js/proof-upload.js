// Deposit-proof panel: platform tile picker, file preview, and submitting
// to upload-proof.php, which forwards the image to Telegram.
(() => {
  const tiles = document.querySelectorAll('.platform-tile');
  const fileInput = document.getElementById('proof-file-input');
  const preview = document.getElementById('proof-preview');
  const placeholder = document.getElementById('proof-upload-placeholder');
  const removeBtn = document.getElementById('proof-remove-btn');
  const submitBtn = document.getElementById('proof-submit-btn');
  const statusEl = document.getElementById('proof-status');
  const idInput = document.getElementById('proof-account-id');
  const panel = document.getElementById('proof-form-panel');
  if (!fileInput || !submitBtn) return;

  let activePlatform = 'onexbet';

  tiles.forEach((tile) => {
    tile.addEventListener('click', () => {
      tiles.forEach((t) => t.classList.remove('active'));
      tile.classList.add('active');
      activePlatform = tile.dataset.platform;
    });
  });

  fileInput.addEventListener('change', () => {
    const file = fileInput.files[0];
    if (!file) return;
    if (preview.src) URL.revokeObjectURL(preview.src);
    preview.src = URL.createObjectURL(file);
    preview.hidden = false;
    if (placeholder) placeholder.hidden = true;
    if (removeBtn) removeBtn.hidden = false;
    submitBtn.removeAttribute('disabled');
    submitBtn.removeAttribute('aria-disabled');
  });

  if (removeBtn) {
    removeBtn.addEventListener('click', () => {
      if (preview.src) URL.revokeObjectURL(preview.src);
      fileInput.value = '';
      preview.hidden = true;
      preview.removeAttribute('src');
      if (placeholder) placeholder.hidden = false;
      removeBtn.hidden = true;
      submitBtn.setAttribute('disabled', '');
      submitBtn.setAttribute('aria-disabled', 'true');
      statusEl.hidden = true;
    });
  }

  function showStatus(ok, message) {
    statusEl.textContent = message || (ok ? statusEl.dataset.successText : statusEl.dataset.errorText);
    statusEl.classList.toggle('proof-status-ok', ok);
    statusEl.classList.toggle('proof-status-error', !ok);
    statusEl.hidden = false;
  }

  submitBtn.addEventListener('click', async () => {
    const file = fileInput.files[0];
    if (!file) return;

    submitBtn.setAttribute('disabled', '');
    submitBtn.setAttribute('aria-disabled', 'true');
    statusEl.hidden = true;

    const formData = new FormData();
    formData.append('screenshot', file);
    formData.append('platform', activePlatform);
    formData.append('account_id', idInput ? idInput.value.trim() : '');

    try {
      const res = await fetch('/upload-proof.php', { method: 'POST', body: formData });
      const data = await res.json();
      showStatus(!!data.ok, data.message);
      if (data.ok) {
        panel.classList.add('proof-panel-done');
      } else {
        submitBtn.removeAttribute('disabled');
        submitBtn.removeAttribute('aria-disabled');
      }
    } catch (err) {
      showStatus(false);
      submitBtn.removeAttribute('disabled');
      submitBtn.removeAttribute('aria-disabled');
    }
  });
})();
