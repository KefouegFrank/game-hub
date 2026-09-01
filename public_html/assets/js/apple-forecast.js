// Apple of Fortune prediction card. Same card, schedule and refresh behaviour as
// the crash one (forecast-slots.js); what it draws is a pick for each of the ten
// levels plus a suggested level to stop at, with the real coefficients from
// apple-math.js down the right-hand side.
(() => {
  const A = window.AppleMath;
  const S = window.ForecastSlots;
  const rowsEl = document.getElementById('apple-rows');
  if (!A || !S || !rowsEl) return;

  const cardEl = document.getElementById('apple-card');
  const figureEl = document.getElementById('apple-figure');
  const clockEl = document.getElementById('apple-clock');
  const countdownEl = document.getElementById('apple-countdown');
  const refreshBtn = document.getElementById('apple-refresh');
  const refreshLabel = document.getElementById('apple-refresh-label');

  const startsInLabel = rowsEl.dataset.startsIn || 'Starts in';
  const runningLabel = rowsEl.dataset.running || 'Running now';
  const levelLabel = rowsEl.dataset.level || 'Level';
  const cellLabel = rowsEl.dataset.cell || 'Cell';

  // Levels 8-10 are a coin-toss dressed up as a jackpot, so the suggested stop
  // stays in the range a player can actually reach: 3 through 7.
  const STOP_MIN = 3;
  const STOP_MAX = 7;

  const fmt = S.formatter();

  let seed = S.newSeed();
  let firstSlot = null;

  const pickFor = (slot, level) =>
    Math.floor(S.uniform(seed + ':' + slot + ':' + level) * A.CELLS);

  const stopFor = (slot) =>
    STOP_MIN + Math.floor(S.uniform(seed + ':' + slot + ':stop') * (STOP_MAX - STOP_MIN + 1));

  function build(now) {
    const stop = stopFor(firstSlot);
    rowsEl.innerHTML = '';

    A.table.forEach((row) => {
      const pick = pickFor(firstSlot, row.level);
      const el = document.createElement('div');
      el.className =
        'apple-row' +
        (row.level === stop ? ' is-target' : '') +
        (row.level > stop ? ' is-beyond' : '');

      const cells = Array.from(
        { length: A.CELLS },
        (_, i) => `<span class="apple-cell${i === pick ? ' is-pick' : ''}"></span>`,
      ).join('');

      el.innerHTML =
        `<span class="apple-level">${row.level}</span>` +
        `<span class="apple-cells" aria-label="${cellLabel} ${pick + 1}/${A.CELLS}">${cells}</span>` +
        `<span class="apple-coef">${fmt(row.coefficient)}</span>`;
      rowsEl.appendChild(el);
    });

    clockEl.textContent = S.clock(firstSlot);
    figureEl.textContent = fmt(A.coefficient(stop));
    cardEl.dataset.stop = String(stop);
    paint(now);
  }

  function paint(now) {
    const stop = cardEl.dataset.stop;
    const when =
      now >= firstSlot ? runningLabel : startsInLabel + ' ' + S.countdown(firstSlot, now);
    countdownEl.textContent = `${levelLabel} ${stop} · ${when}`;
  }

  const isBusy = S.bindRefresh(cardEl, refreshBtn, refreshLabel, () => {
    seed = S.newSeed();
    build(Date.now());
  });

  function tick() {
    if (isBusy()) return;
    const now = Date.now();
    const slot = S.nextSlot(now);
    if (slot !== firstSlot) {
      firstSlot = slot;
      build(now);
    } else {
      paint(now);
    }
  }

  tick();
  setInterval(tick, 1000);
})();
