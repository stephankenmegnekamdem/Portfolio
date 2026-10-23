/* Clicking or pressing Enter/Space on the arrow scrolls to the next screen. */
export function initScrollCue() {
    const cue = document.getElementById('scroll-cue');
    if (!cue) return;

    // Scrolls to the next screen, or to the next section after <main>
    function goNext() {
        const container = document.querySelector('.snap-container');
        const home = cue.closest('.screen') || document.querySelector('main');
        const next = home ? home.nextElementSibling : null;

        if (next) {
            next.scrollIntoView({ behavior: 'smooth', block: 'start' });
        } else if (container) {
            container.scrollBy({ top: container.clientHeight, behavior: 'smooth' });
        }
    }

    cue.addEventListener('click', goNext);

    cue.addEventListener('keydown', (event) => {
        if (event.key === 'Enter' || event.key === ' ') {
            event.preventDefault();
            goNext();
        }
    });
}
