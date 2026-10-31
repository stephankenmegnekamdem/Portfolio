/* Keyboard movement between cards.
   Focus a card with Tab, then use the arrow keys:
   Up and Down move to the card in the row above or below,
   Left and Right move to the neighbouring card,
   Home and End jump to the first and last card in the same group.
   Arrow keys work only when the card itself has focus, so they never
   interfere with a "More details" button inside a card. */

const CARD_SELECTOR = '.tcard, .pdetail-card, .about-panel';

function columnCount(grid) {
    const columns = getComputedStyle(grid).gridTemplateColumns;
    return Math.max(1, columns.split(' ').filter(Boolean).length);
}

export function initCardNav() {
    document.addEventListener('keydown', (event) => {
        const card = event.target.closest ? event.target.closest(CARD_SELECTOR) : null;

        // Only act when the card itself has focus
        if (!card || event.target !== card) return;

        const grid = card.parentElement;
        if (!grid) return;

        const cards = [...grid.children].filter((el) => el.matches(CARD_SELECTOR));
        const index = cards.indexOf(card);
        const cols = columnCount(grid);

        let next = null;

        switch (event.key) {
            case 'ArrowDown':  next = index + cols; break;
            case 'ArrowUp':    next = index - cols; break;
            case 'ArrowRight': next = index + 1;    break;
            case 'ArrowLeft':  next = index - 1;    break;
            case 'Home':       next = 0;            break;
            case 'End':        next = cards.length - 1; break;
            default: return;
        }

        // At the edge of the group, let the page scroll as normal
        if (next < 0 || next >= cards.length) return;

        event.preventDefault();

        const target = cards[next];
        target.focus({ preventScroll: true });

        const reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        target.scrollIntoView({ block: 'nearest', behavior: reduce ? 'auto' : 'smooth' });
    });
}
