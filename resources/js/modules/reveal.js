import { reduceMotion, snapContainer } from '../lib/dom';

// Elements that fade in when they scroll into view
const SELECTOR = '.sections, .hero-card, .identity-card, .cf-info, .cf-card, .accordion-item';

export function initReveal() {
    const container = snapContainer();

    // Skip the animation entirely if the browser can't observe, or the user prefers no motion
    if (!container || !('IntersectionObserver' in window) || reduceMotion()) return;

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target);
            }
        });
    }, { root: container, threshold: 0.15 });

    document.querySelectorAll(SELECTOR).forEach((el) => {
        el.classList.add('reveal');
        observer.observe(el);
    });
}
