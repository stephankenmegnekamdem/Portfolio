/* Desktop: when scrolling stops near a section, the page settles with that section at the top.
   It does nothing once the footer is on screen, so the end of the page stays where you leave it,
   and it stays out of the way during menu jumps. */
import { reduceMotion, snapContainer } from '../lib/dom';

const SETTLE_DELAY = 150;  // ms without scrolling before the page settles
const NEAR_RATIO = 0.25;   // settle only if a section top is within 25% of the screen height

export function initPageSnap() {
    // Guard: CV and contact pages have no screens to snap to
    if (!snapContainer() || reduceMotion()) return;

    const desktop = window.matchMedia('(min-width: 768px) and (pointer: fine)');
    const footer = document.querySelector('.screen-footer');
    let timer = null;

    const footerVisible = () => {
        if (!footer) return false;
        return footer.getBoundingClientRect().top < window.innerHeight * 0.9;
    };

    const settle = () => {
        if (!desktop.matches || window.__navScrolling) return;

        // The footer is on screen: never pull the page back up from the end
        if (footerVisible()) return;

        const y = window.scrollY;
        const limit = window.innerHeight * NEAR_RATIO;
        let nearest = null;
        let best = Infinity;

        document.querySelectorAll('.screen:not(.screen-footer)').forEach((el) => {
            const top = el.getBoundingClientRect().top + window.scrollY;
            const distance = Math.abs(top - y);
            if (distance < best) {
                best = distance;
                nearest = top;
            }
        });

        if (nearest !== null && best > 1 && best < limit) {
            window.scrollTo({ top: nearest, behavior: 'smooth' });
        }
    };

    window.addEventListener('scroll', () => {
        clearTimeout(timer);
        timer = setTimeout(settle, SETTLE_DELAY);
    }, { passive: true });
}
