// Provably-fair verifier and the odds table. Recomputes a settled round from the
// seeds the casino publishes, using the same maths the simulator runs.
(() => {
  const M = window.CrashMath;
  if (!M) return;

  const warning = document.getElementById('no-crypto-warning');
  if (!M.hasCrypto()) {
    if (warning) warning.hidden = false;
    return;
  }

  // --- Verifier ---
  const runBtn = document.getElementById('verify-run');
  const serverInput = document.getElementById('verify-server');
  const clientInput = document.getElementById('verify-client');
  const nonceInput = document.getElementById('verify-nonce');
  const errorEl = document.getElementById('verify-error');
  const outputEl = document.getElementById('verify-output');
  const crashEl = document.getElementById('verify-crash');
  const hashEl = document.getElementById('verify-hash');

  if (runBtn) {
    runBtn.addEventListener('click', async () => {
      const server = serverInput.value.trim();
      const client = clientInput.value.trim();
      const nonce = nonceInput.value.trim();

      const ok = server !== '' && client !== '' && /^\d+$/.test(nonce);
      errorEl.hidden = ok;
      if (!ok) {
        outputEl.hidden = true;
        return;
      }

      const { hex, crash } = await M.crashPoint(server, client, Number(nonce));
      crashEl.textContent = crash.toFixed(2) + '×';
      hashEl.textContent = hex;
      outputEl.hidden = false;
    });
  }

  // --- Odds table ---
  const body = document.getElementById('odds-body');
  if (body) {
    [1.2, 1.5, 2, 3, 5, 10, 50, 100].forEach((target) => {
      const chance = M.hitChance(target);
      const ret = M.expectedReturn(target);
      const row = document.createElement('tr');
      row.innerHTML =
        `<td>${target.toFixed(2)}×</td>` +
        `<td>${(chance * 100).toFixed(2)}%</td>` +
        `<td class="odds-negative">${((ret - 1) * 100).toFixed(2)}%</td>`;
      body.appendChild(row);
    });
  }
})();
