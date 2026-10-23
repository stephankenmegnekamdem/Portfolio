import { makeCursor, typeInto } from '../lib/typing';
import { reduceMotion, snapContainer } from '../lib/dom';

const PIXEL_BLOCK = 6; // size of each pixel in screen px. Lower = finer pixels
const PIXEL_HOLD_MS = 900;
const LINE_HOLD_MS = 1600;
const FADE_MS = 500;

/* Shows a command in the corner of a screen (or page), types it, then fades it out. */
function showCommand(host, text, fixed) {
    host.querySelectorAll('.term-line').forEach((old) => old.remove());

    const line = document.createElement('div');
    line.className = 'term-line' + (fixed ? ' term-line--fixed' : '');

    const out = document.createElement('span');
    line.appendChild(out);
    line.appendChild(makeCursor());
    host.appendChild(line);

    requestAnimationFrame(() => line.classList.add('is-on'));

    typeInto(out, text, 35, () => {
        setTimeout(() => {
            line.classList.remove('is-on');
            setTimeout(() => line.remove(), FADE_MS);
        }, LINE_HOLD_MS);
    });
}

/* The command shown for a screen. Uses data-term if set, otherwise the element's id or heading. */
function labelFor(screen) {
    if (screen.dataset.term) return '$ ' + screen.dataset.term;

    const withId = screen.querySelector('[id]:not(#scroll-cue)');
    if (withId) return '$ cd /' + withId.id;

    const heading = screen.querySelector('h1, h2');
    if (heading) {
        return '$ cd /' + heading.textContent.trim().toLowerCase().replace(/\s+/g, '-');
    }

    return '$ cd /' + (screen.dataset.name || 'section');
}

/* Shrinks an image into tiny blocks, then restores it: a pixelated reveal. */
function pixelate(img) {
    if (reduceMotion() || !img.complete || !img.naturalWidth || img.dataset.pixelBusy) return;

    const displayW = img.clientWidth;
    if (!displayW) return;

    const smallW = Math.max(4, Math.round(displayW / PIXEL_BLOCK));
    const smallH = Math.max(4, Math.round(smallW * img.naturalHeight / img.naturalWidth));

    const canvas = document.createElement('canvas');
    canvas.width = smallW;
    canvas.height = smallH;

    const ctx = canvas.getContext('2d');
    ctx.imageSmoothingEnabled = false;

    let url;
    try {
        ctx.drawImage(img, 0, 0, smallW, smallH);
        url = canvas.toDataURL('image/png');
    } catch (e) {
        return; // cross-origin images can't be read, so skip them
    }

    const original = img.getAttribute('src');
    img.dataset.pixelBusy = '1';
    img.classList.add('is-pixelated');
    img.src = url;

    setTimeout(() => {
        img.src = original;
        img.classList.remove('is-pixelated');
        delete img.dataset.pixelBusy;
    }, PIXEL_HOLD_MS);
}

function pixelateScreen(screen) {
    screen.querySelectorAll('img').forEach((img) => {
        if (img.naturalWidth > 120) pixelate(img); // skip icons and logos
    });
}

/* Footer message: types out when the footer scrolls into view. */
function initFooterMessage(container) {
    const footer = document.querySelector('.screen-footer');
    const footerBody = footer ? footer.querySelector('.screen-body') : null;

    if (!footer || !footerBody || footerBody.textContent.trim() !== '') return;

    const out = document.createElement('div');
    out.className = 'footer-terminal';

    const text = document.createElement('span');
    out.appendChild(text);
    out.appendChild(makeCursor());
    footerBody.appendChild(out);

    const message = '> thanks for visiting\n> end of page';

    const observer = new IntersectionObserver((entries, obs) => {
        if (entries[0].isIntersecting) {
            typeInto(text, message, 50);
            obs.disconnect();
        }
    }, { root: container, threshold: 0.5 });

    observer.observe(footer);
}

export function initTerminal() {
    const container = snapContainer();

    // Pages without snap screens (CV, contact): one command line at the top
    if (!container) {
        const path = location.pathname.replace(/\/$/, '') || '/home';
        const host = document.querySelector('main') || document.body;
        showCommand(host, '$ cd ' + path, true);
        return;
    }

    // Each screen types its command and pixelates its images when it comes into view.
    // The `current` check stops a screen re-typing while it stays visible.
    let current = null;

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (!entry.isIntersecting || entry.target === current) return;

            current = entry.target;
            showCommand(current, labelFor(current), false);
            pixelateScreen(current);
        });
    }, { root: container, threshold: 0.6 });

    document.querySelectorAll('.screen:not(.screen-footer)').forEach((screen) => {
        observer.observe(screen);
    });

    initFooterMessage(container);
}
