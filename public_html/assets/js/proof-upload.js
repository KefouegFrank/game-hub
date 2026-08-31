// Deposit-proof panel: platform tile picker, file preview, ID validation, and
// submitting to upload-proof.php, which forwards the image to Telegram.
//
// The ID format (8-10 digits) matches the account-number scheme 1xBet and
// MegaPari both use — MegaPari is a white-label on the same 1xBet-network
// backend, so it shares the numeric account ID format.
(() => {
  const tiles = document.querySelectorAll('.platform-tile');
  const fileInput = document.getElementById('proof-file-input');
  const preview = document.getElementById('proof-preview');
  const uploadBox = document.getElementById('proof-upload-box');
  const removeBtn = document.getElementById('proof-remove-btn');
  const submitBtn = document.getElementById('proof-submit-btn');
  const statusEl = document.getElementById('proof-status');
  const idInput = document.getElementById('proof-account-id');
  const idError = document.getElementById('proof-id-error');
  const panel = document.getElementById('proof-form-panel');
  if (!fileInput || !submitBtn) return;

  const ID_PATTERN = /^\d{8,10}$/;
  const isIdValid = () => !!idInput && ID_PATTERN.test(idInput.value.trim());

  function setIdError(show) {
    if (!idInput) return;
    idInput.classList.toggle('field-invalid', show);
    idInput.setAttribute('aria-invalid', show ? 'true' : 'false');
    if (idError) idError.hidden = !show;
  }

  const hasFile = () => fileInput.files.length > 0;

  // The ID and the screenshot are submitted together or not at all, so Submit
  // stays locked until both are in hand.
  function refreshSubmitState() {
    const ready = hasFile() && isIdValid();
    submitBtn.hidden = !hasFile();
    submitBtn.disabled = !ready;
    submitBtn.setAttribute('aria-disabled', ready ? 'false' : 'true');
  }

  // Silent until the field has been touched — nobody wants an error before
  // they've typed anything.
  let idTouched = false;

  if (idInput) {
    idInput.addEventListener('blur', () => {
      idTouched = true;
      setIdError(idInput.value.trim() !== '' && !isIdValid());
    });
    idInput.addEventListener('input', () => {
      refreshSubmitState();
      if (idTouched) setIdError(idInput.value.trim() !== '' && !isIdValid());
    });
  }

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
    if (uploadBox) uploadBox.hidden = false;
    if (removeBtn) removeBtn.hidden = false;
    refreshSubmitState();
    // Nudge them to the missing half rather than leaving Submit inert and unexplained.
    if (!isIdValid()) {
      idTouched = true;
      setIdError(true);
    }
  });

  if (removeBtn) {
    removeBtn.addEventListener('click', () => {
      if (preview.src) URL.revokeObjectURL(preview.src);
      fileInput.value = '';
      preview.hidden = true;
      preview.removeAttribute('src');
      if (uploadBox) uploadBox.hidden = true;
      removeBtn.hidden = true;
      refreshSubmitState();
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

    idTouched = true;
    if (!isIdValid()) {
      setIdError(true);
      idInput.focus();
      refreshSubmitState();
      return;
    }

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
