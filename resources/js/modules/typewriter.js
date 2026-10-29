import { reduceMotion, snapContainer } from '../lib/dom';

// Headings type slowly; body text types quickly
const HEADING_DELAY_MS = 40;
const BODY_DELAY_MS = 12;
const AFTER_HEADING_MS = 150;
const AFTER_BODY_MS = 60;
const BODY_MAX_STEPS = 120; // long paragraphs are typed in at most this many steps

const HEADING = 'h1, h2, h3, .hero-name, .identity-name, .project-screen-title, .cf-title, .page-title';
const SKIP = 'script, style, input, textarea, select, button, i, ' +
             '.side-nav, .term-line, .term-bar, .footer-terminal, .cf-hp, .material-icons, ' +
             '.cf-card, .cf-chip, .cf-form, [data-no-type]';
const pause = (ms, state) => (state.fast.value ? Promise.resolve() : new Promise((resolve) => setTimeout(resolve, ms)));

/* Writes the first `i` characters into the visible span and the rest into the transparent span.
   The total text never changes, so the layout never changes. */
function render(p, i) {
    p.on.textContent = p.full.slice(0, i);
    p.off.textContent = p.full.slice(i);
}

function finish(p) {
    render(p, p.full.length);
    p.on.classList.remove('is-typing');
}

/* Splits every visible text node into two spans: `on` (typed so far) and `off` (still to come).
   Both are always in the layout, so the element already has its final size. */
function prepare(unit) {
    const nodes = [];
    const walker = document.createTreeWalker(unit, NodeFilter.SHOW_TEXT, {
        acceptNode(node) {
            if (!node.nodeValue.trim()) return NodeFilter.FILTER_REJECT;
            const parent = node.parentElement;
            if (!parent || parent.closest(SKIP)) return NodeFilter.FILTER_REJECT;
            return NodeFilter.FILTER_ACCEPT;
        },
    });

    while (walker.nextNode()) nodes.push(walker.currentNode);

    return nodes.map((node) => {
        const parent = node.parentElement;
        const full = node.nodeValue;

        const wrap = document.createElement('span');
        wrap.className = 'tw';

        const on = document.createElement('span');
        on.className = 'tw-on';

        const off = document.createElement('span');
        off.className = 'tw-off';

        wrap.append(on, off);
        node.parentNode.replaceChild(wrap, node);

        const piece = {
            on,
            off,
            full,
            heading: !!parent.closest(HEADING),
            // Text inside a closed accordion waits until the accordion opens
            details: parent.closest('details:not([open])') && !parent.closest('summary')
                ? parent.closest('details:not([open])')
                : null,
        };

        render(piece, 0);
        return piece;
    });
}

/* Types one piece of text. Returns a promise that resolves when it is finished. */
function typePiece(p, state) {
    return new Promise((resolve) => {
        if (state.fast.value) {
            finish(p);
            return resolve();
        }

        const delay = p.heading ? HEADING_DELAY_MS : BODY_DELAY_MS;
        const chunk = p.heading ? 1 : Math.max(1, Math.ceil(p.full.length / BODY_MAX_STEPS));
        let i = 0;

        p.on.classList.add('is-typing');

        const step = () => {
            if (state.fast.value) {
                finish(p);
                return resolve();
            }

            i = Math.min(p.full.length, i + chunk);
            render(p, i);

            if (i < p.full.length) {
                setTimeout(step, delay);
            } else {
                p.on.classList.remove('is-typing');
                resolve();
            }
        };

        step();
    });
}

/* Types a list of pieces one after another, with a short pause between them. */
function typeList(pieces, state) {
    return pieces.reduce((chain, p) => chain
        .then(() => typePiece(p, state))
        .then(() => pause(p.heading ? AFTER_HEADING_MS : AFTER_BODY_MS, state)),
    Promise.resolve());
}

export function initTypewriter() {
    // The CV page is excluded from typing
    if (document.querySelector('.cv-page')) return;

    // With reduced motion, show everything at once
    if (reduceMotion()) return;

    const container = snapContainer();
    const unitSelector = container ? '.screen' : 'header, main, footer';

    const state = { fast: { value: false } };
    const plan = new Map();      // unit -> pieces to type when the unit comes into view
    const deferred = new Map();  // closed <details> -> pieces to type when it opens

    document.querySelectorAll(unitSelector).forEach((unit) => {
        const pieces = prepare(unit).filter((p) => {
            if (!p.details) return true;
            if (!deferred.has(p.details)) deferred.set(p.details, []);
            deferred.get(p.details).push(p);
            return false;
        });
        plan.set(unit, pieces);
    });

    // Type each unit when it comes into view
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (!entry.isIntersecting) return;

            const pieces = plan.get(entry.target) || [];
            plan.delete(entry.target);
            observer.unobserve(entry.target);
            typeList(pieces, state);
        });
    }, { root: container || null, threshold: 0 });

    plan.forEach((_, unit) => observer.observe(unit));

    // Closed accordions type their text when they are opened
    document.querySelectorAll('details').forEach((d) => {
        d.addEventListener('toggle', () => {
            if (!d.open || !deferred.has(d)) return;

            const pieces = deferred.get(d);
            deferred.delete(d);
            typeList(pieces, state);
        });
    });

    // Skip: any click, key, touch or scroll shows all remaining text at once
    ['pointerdown', 'keydown', 'touchstart', 'wheel'].forEach((type) => {
        window.addEventListener(type, () => { state.fast.value = true; }, { once: true, passive: true });
    });
}
