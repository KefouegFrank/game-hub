// Apple of Fortune (1xGames) maths. Ten levels, five cells each; pick a good
// apple to climb, hit a poisoned one and the round is over.
//
// Poisoned apples per level: 1 on levels 1-4, 2 on 5-7, 3 on 8-9, 4 on level 10.
// Guide sites disagree about this, but the published coefficients settle it —
// each step multiplies the payout by 1/chance, and floor(99 / cumulative) / 100
// reproduces the official table (1.23 … 349.68) to the cent. That is the same
// 1% house edge, and the same rounding, as the crash game in crash-math.js.
(() => {
  const CELLS = 5;
  const BAD = [1, 1, 1, 1, 2, 2, 2, 3, 3, 4];
  const LEVELS = BAD.length;

  // Chance of surviving one level, and of reaching it from the start.
  const levelChance = (level) => (CELLS - BAD[level - 1]) / CELLS;

  function reachChance(level) {
    let p = 1;
    for (let i = 1; i <= level; i++) p *= levelChance(i);
    return p;
  }

  const coefficient = (level) => Math.floor(99 / reachChance(level)) / 100;

  const table = Array.from({ length: LEVELS }, (_, i) => ({
    level: i + 1,
    bad: BAD[i],
    chance: levelChance(i + 1),
    reach: reachChance(i + 1),
    coefficient: coefficient(i + 1),
  }));

  window.AppleMath = { CELLS, LEVELS, BAD, levelChance, reachChance, coefficient, table };
})();
