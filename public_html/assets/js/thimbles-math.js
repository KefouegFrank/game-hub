// Thimbles (Evoplay, on 1xBet as a 1xGame). Three thimbles, always; the mode
// decides how many of them hide a ball. Pick a loaded one and the bet pays.
//
// Both published payouts come from one rule — 96% RTP, so payout = 0.96 / chance:
//   1 ball  → 1 in 3 (33.33%) → 2.88x
//   2 balls → 2 in 3 (66.67%) → 1.44x
// Guide sites also describe 4- and 5-thimble "risk tiers" (3.84x / 4.80x, which
// fit the same rule). The mode descriptions contradict them, so they are left out.
(() => {
  const THIMBLES = 3;
  const RTP = 0.96;

  const chance = (balls) => balls / THIMBLES;
  const coefficient = (balls) => Math.round((RTP / chance(balls)) * 100) / 100;

  window.ThimblesMath = { THIMBLES, coefficient };
})();
