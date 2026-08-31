// The real bustabit-style crash maths, shared by the simulator and the verifier.
//
//   X     = first 52 bits of HMAC-SHA256(serverSeed, "clientSeed:nonce"), scaled to [0,1)
//   crash = max(1.00, floor(99 / (1 - X)) / 100)
//
// The 99 rather than 100 is the whole 1% house edge. Exposed globally as
// window.CrashMath so both tools compute identically — a result the simulator
// produces can be pasted straight into the verifier and will match.
(() => {
  const HOUSE_EDGE_NUMERATOR = 99;

  const hasCrypto = () => typeof crypto !== 'undefined' && crypto.subtle;

  function toHex(buffer) {
    return [...new Uint8Array(buffer)].map((b) => b.toString(16).padStart(2, '0')).join('');
  }

  async function hmacSha256Hex(key, message) {
    const enc = new TextEncoder();
    const cryptoKey = await crypto.subtle.importKey(
      'raw',
      enc.encode(key),
      { name: 'HMAC', hash: 'SHA-256' },
      false,
      ['sign'],
    );
    return toHex(await crypto.subtle.sign('HMAC', cryptoKey, enc.encode(message)));
  }

  async function sha256Hex(message) {
    return toHex(await crypto.subtle.digest('SHA-256', new TextEncoder().encode(message)));
  }

  // The inverse of the crash distribution: a uniform in [0,1) becomes a crash
  // point. Everything that draws a round goes through here.
  function crashFromUniform(x) {
    return Math.max(1, Math.floor(HOUSE_EDGE_NUMERATOR / (1 - x)) / 100);
  }

  // 13 hex chars = 52 bits, which stays inside Number's exact-integer range.
  function hashToCrash(hex) {
    return crashFromUniform(parseInt(hex.slice(0, 13), 16) / Math.pow(2, 52));
  }

  async function crashPoint(serverSeed, clientSeed, nonce) {
    const hex = await hmacSha256Hex(serverSeed, `${clientSeed}:${nonce}`);
    return { hex, crash: hashToCrash(hex) };
  }

  function randomSeed(bytes = 32) {
    const buf = new Uint8Array(bytes);
    crypto.getRandomValues(buf);
    return toHex(buf.buffer);
  }

  // Chance of a round reaching a given multiplier, and what that implies for a
  // fixed cash-out target. Always negative — that is the point.
  function hitChance(multiplier) {
    return multiplier <= 1 ? 1 : HOUSE_EDGE_NUMERATOR / 100 / multiplier;
  }

  function expectedReturn(multiplier) {
    return hitChance(multiplier) * multiplier;
  }

  window.CrashMath = {
    HOUSE_EDGE_NUMERATOR,
    hasCrypto,
    sha256Hex,
    hmacSha256Hex,
    crashFromUniform,
    hashToCrash,
    crashPoint,
    randomSeed,
    hitChance,
    expectedReturn,
  };
})();
