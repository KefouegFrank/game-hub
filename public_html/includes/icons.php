<?php
// Inline SVG icons reused across header, footer, homepage, and game pages.
// Kept as functions (not partials) since some need per-call color/id params.

function icon_telegram(): string {
    return '<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">'
        . '<path d="M4 12.4 19 5.5c.7-.3 1.4.3 1.1 1.1l-2.6 12.7c-.2.9-1.2 1.3-1.9.8l-3.9-2.9-2 1.9c-.3.3-.7.3-.9-.1l-.6-3.4" stroke="#fff" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />'
        . '<path d="m8.2 14.1 9-6.9-10.4 7 1.4 4.6" stroke="#fff" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />'
        . '</svg>';
}

function icon_android(string $color = 'currentColor', string $eye = '#fff'): string {
    $color = htmlspecialchars($color);
    $eye = htmlspecialchars($eye);
    return '<svg viewBox="0 0 24 24" fill="' . $color . '" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">'
        . '<path d="M7 10c0-2.8 2.2-5 5-5s5 2.2 5 5v4a1 1 0 0 1-1 1H8a1 1 0 0 1-1-1v-4Z" />'
        . '<circle cx="9.7" cy="10" r="0.9" fill="' . $eye . '" />'
        . '<circle cx="14.3" cy="10" r="0.9" fill="' . $eye . '" />'
        . '<path d="M8.3 6 7.3 4.3M15.7 6l1-1.7" stroke="' . $color . '" stroke-width="1.3" stroke-linecap="round" fill="none" />'
        . '<rect x="5.2" y="10.5" width="1.6" height="4.2" rx="0.8" />'
        . '<rect x="17.2" y="10.5" width="1.6" height="4.2" rx="0.8" />'
        . '<rect x="9.7" y="16.3" width="1.6" height="3" rx="0.8" />'
        . '<rect x="12.7" y="16.3" width="1.6" height="3" rx="0.8" />'
        . '</svg>';
}

function icon_globe(): string {
    return '<svg viewBox="0 0 24 24" fill="none" stroke="#38bdf8" stroke-width="1.6" aria-hidden="true">'
        . '<circle cx="12" cy="12" r="9" />'
        . '<path d="M3 12h18M12 3c2.2 2.4 3.5 5.5 3.5 9s-1.3 6.6-3.5 9c-2.2-2.4-3.5-5.5-3.5-9s1.3-6.6 3.5-9Z" />'
        . '</svg>';
}

// $class picks the sizing context (nav logo vs. hero visual); $gradientId must be
// unique per page since both can appear on the same page (e.g. homepage).
function icon_logo_mark(string $class, string $gradientId, string $strokeWidth): string {
    $class = htmlspecialchars($class);
    $gradientId = htmlspecialchars($gradientId);
    $strokeWidth = htmlspecialchars($strokeWidth);
    return '<svg class="' . $class . '" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">'
        . '<defs><linearGradient id="' . $gradientId . '" x1="0" y1="0" x2="32" y2="32" gradientUnits="userSpaceOnUse">'
        . '<stop offset="0" style="stop-color:var(--accent-a)" /><stop offset="1" style="stop-color:var(--accent-b)" /></linearGradient></defs>'
        . '<path d="M16 2 L28 16 L16 30 L4 16 Z" stroke="url(#' . $gradientId . ')" stroke-width="' . $strokeWidth . '" stroke-linejoin="round" />'
        . '<circle cx="16" cy="16" r="4" fill="url(#' . $gradientId . ')" />'
        . '</svg>';
}
