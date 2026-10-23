import { snapContainer } from '../lib/dom';

/* A thin bar at the top of the page that fills as you scroll. */
export function initProgressBar() {
    const container = snapContainer();
    if (!container) return;

    const bar = document.createElement('div');
    bar.className = 'scroll-progress';
    document.body.appendChild(bar);

    const update = () => {
        const max = container.scrollHeight - container.clientHeight;
        const percent = max > 0 ? (container.scrollTop / max) * 100 : 0;
        bar.style.width = percent + '%';
    };

    container.addEventListener('scroll', update, { passive: true });
    update();
}
