import { reduceMotion } from '../lib/dom';

// Elements that fade in when they scroll into view.
// Accordions are not listed: their boxes and text must be sharp and visible at once.
const SELECTOR = '.sections, .hero-card, .identity-card, .cf-info, .cf-card';

export function initReveal() {
    // Skip the animation if the browser can't observe, or the user prefers no motion
    if (!('IntersectionObserver' in window) || reduceMotion()) return;

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.15 });

    document.querySelectorAll(SELECTOR).forEach((el) => {
        // Elements inside a [data-no-reveal] container are shown straight away
        if (el.closest('[data-no-reveal]')) return;

        el.classList.add('reveal');
        observer.observe(el);
    });
}
