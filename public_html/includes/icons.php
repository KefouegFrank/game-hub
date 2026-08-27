<?php
// Inline SVG icons reused across header, footer, homepage, and game pages.
// Kept as functions (not partials) since some need per-call color/id params.

function icon_whatsapp(string $bubble = '#fff', string $glyph = '#25d366'): string {
    $bubble = htmlspecialchars($bubble);
    $glyph = htmlspecialchars($glyph);
    return '<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">'
        . '<path d="M12.04 2.6c-5.2 0-9.42 4.22-9.42 9.42 0 1.66.44 3.28 1.27 4.71L2.5 21.5l4.9-1.28a9.4 9.4 0 0 0 4.64 1.18c5.2 0 9.42-4.22 9.42-9.42s-4.22-9.38-9.42-9.38Z" fill="' . $bubble . '" />'
        . '<path d="M9.4 7.7c-.18-.42-.37-.43-.55-.44h-.47c-.16 0-.42.06-.64.3-.22.24-.84.82-.84 2s.86 2.32.98 2.48c.12.16 1.67 2.68 4.13 3.65 2.05.8 2.46.64 2.9.6.45-.04 1.44-.59 1.64-1.15.2-.57.2-1.05.14-1.15-.06-.1-.22-.16-.46-.28-.24-.12-1.43-.7-1.65-.79-.22-.08-.38-.12-.55.12-.16.24-.62.79-.76.95-.14.16-.28.18-.52.06-.24-.12-1.02-.37-1.94-1.19-.72-.64-1.2-1.43-1.34-1.67-.14-.24-.02-.37.1-.49.11-.1.24-.28.36-.42.11-.14.15-.24.23-.4.08-.16.04-.3-.02-.42-.06-.12-.52-1.29-.72-1.76Z" fill="' . $glyph . '" />'
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

// Browser marks for the "website" platform buttons — full-colour so they read as
// brand logos next to the Android robot on the app buttons.
function icon_chrome(): string {
    return '<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">'
        . '<circle cx="12" cy="12" r="10.4" fill="#fff" />'
        . '<path d="M1.6 12A10.4 10.4 0 0 1 17.2 2.99L14.5 7.67A5 5 0 0 0 7 12Z" fill="#ea4335" />'
        . '<path d="M17.2 2.99a10.4 10.4 0 0 1 0 18.02L14.5 16.33a5 5 0 0 0 0-8.66Z" fill="#fbbc05" />'
        . '<path d="M17.2 21.01A10.4 10.4 0 0 1 1.6 12H7a5 5 0 0 0 7.5 4.33Z" fill="#34a853" />'
        . '<circle cx="12" cy="12" r="4.1" fill="#4285f4" />'
        . '</svg>';
}

function icon_compass(): string {
    return '<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">'
        . '<circle cx="12" cy="12" r="10.4" fill="#2f8fff" />'
        . '<path d="m17 7-6.4 3.6L7 17l6.4-3.6Z" fill="#fff" />'
        . '</svg>';
}

function icon_clapper(): string {
    return '<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">'
        . '<rect x="2.5" y="9" width="19" height="11.5" rx="1.6" fill="#d7dcea" />'
        . '<path d="M2.9 6.2 20 2.6l1 4.3L3.9 10.5Z" fill="#1b1f2b" />'
        . '<path d="m8.1 4.7 1.5 3.9M13 3.7l1.5 3.9M17.9 2.7l1.5 3.9" stroke="#fff" stroke-width="1.2" />'
        . '</svg>';
}

function icon_clipboard(): string {
    return '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">'
        . '<rect x="8" y="3" width="8" height="4" rx="1" />'
        . '<path d="M16 5h2a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1h2" />'
        . '</svg>';
}

function icon_warning(string $class = ''): string {
    $class = htmlspecialchars($class);
    return '<svg class="' . $class . '" viewBox="0 0 24 24" fill="none" stroke="#f59e0b" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">'
        . '<path d="M12 3 2 20h20L12 3Z" />'
        . '<path d="M12 10v4" />'
        . '<circle cx="12" cy="17" r="0.5" fill="#f59e0b" />'
        . '</svg>';
}

function icon_home(): string {
    return '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">'
        . '<path d="M4 11 12 4l8 7" />'
        . '<path d="M6 10v9h12v-9" />'
        . '<path d="M10 19v-5h4v5" />'
        . '</svg>';
}

function icon_upload(): string {
    return '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">'
        . '<path d="M12 15V4M8 8l4-4 4 4" />'
        . '<path d="M4 15v4a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-4" />'
        . '</svg>';
}

function icon_image_placeholder(): string {
    return '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">'
        . '<rect x="3" y="4" width="18" height="16" rx="2" />'
        . '<circle cx="8.5" cy="9.5" r="1.5" />'
        . '<path d="m3 17 5-5 4 4 3-3 6 6" />'
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
