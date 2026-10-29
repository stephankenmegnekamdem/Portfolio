import { snapContainer } from '../lib/dom';

/* A thin bar at the top of the page that fills as you scroll.
   Only on pages with the screen layout (home and projects). */
export function initProgressBar() {
    if (!snapContainer()) return;

    const bar = document.createElement('div');
    bar.className = 'scroll-progress';
    document.body.appendChild(bar);

    const update = () => {
        const max = document.documentElement.scrollHeight - window.innerHeight;
        const percent = max > 0 ? (window.scrollY / max) * 100 : 0;
        bar.style.width = Math.min(100, Math.max(0, percent)) + '%';
    };

    window.addEventListener('scroll', update, { passive: true });
    window.addEventListener('resize', update);
    update();
}
