// The crash curve, shared with whatever needs to draw a round.
//
//   crash = max(1.00, floor(99 / (1 - X)) / 100)   for X uniform in [0,1)
//
// The 99 rather than 100 is the whole 1% house edge. The provably-fair side of
// this (HMAC-SHA256 over serverSeed/clientSeed/nonce, which produces X) lived
// here until the verifier was removed; it is in git if it is ever wanted back.
(() => {
  const HOUSE_EDGE_NUMERATOR = 99;

  function crashFromUniform(x) {
    return Math.max(1, Math.floor(HOUSE_EDGE_NUMERATOR / (1 - x)) / 100);
  }

  window.CrashMath = { crashFromUniform };
})();
