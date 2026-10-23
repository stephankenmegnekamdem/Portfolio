const RESET_AFTER_MS = 2000;

/* Writes text to the clipboard. Resolves to true on success.
   Uses the modern API on secure pages, and a hidden textarea as a fallback. */
function copyText(text) {
    if (navigator.clipboard && window.isSecureContext) {
        return navigator.clipboard.writeText(text).then(() => true, () => false);
    }

    const helper = document.createElement('textarea');
    helper.value = text;
    helper.setAttribute('readonly', '');
    helper.style.position = 'fixed';
    helper.style.left = '-9999px';
    document.body.appendChild(helper);
    helper.select();

    let ok = false;
    try {
        ok = document.execCommand('copy');
    } catch (e) {
        ok = false;
    }
    document.body.removeChild(helper);

    return Promise.resolve(ok);
}

function showResult(button, label, success) {
    if (!label) return;

    const original = button.dataset.originalLabel || label.textContent;
    button.dataset.originalLabel = original;

    label.textContent = success ? 'Copied!' : 'Failed';

    clearTimeout(button._copyTimer);
    button._copyTimer = setTimeout(() => {
        label.textContent = original;
    }, RESET_AFTER_MS);
}

/* One listener on the document handles every [data-copy] button,
   including any added to the page later. */
export function initCopyButtons() {
    document.addEventListener('click', (event) => {
        const button = event.target.closest('[data-copy]');
        if (!button) return;

        const label = button.querySelector('.cf-copy-label');

        copyText(button.dataset.copy).then((ok) => showResult(button, label, ok));
    });
}
