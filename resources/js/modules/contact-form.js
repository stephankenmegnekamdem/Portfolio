/* While the contact form is sending, disable the button and show "Sending…".
   Restore it when the page comes back from the browser's back/forward cache. */
export function initContactForm() {
    const form = document.querySelector('.cf-form');
    if (!form) return;

    form.addEventListener('submit', () => {
        const btn = form.querySelector('.cf-submit');
        if (!btn) return;

        btn.disabled = true;
        btn.querySelector('.cf-submit-label').textContent = 'Sending…';
    });

    window.addEventListener('pageshow', () => {
        const btn = form.querySelector('.cf-submit');
        if (!btn) return;

        btn.disabled = false;
        btn.querySelector('.cf-submit-label').textContent = 'Send message';
    });
}
