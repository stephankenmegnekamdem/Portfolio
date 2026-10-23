import { makeCursor } from '../lib/typing';
import { reduceMotion, snapContainer } from '../lib/dom';

// Headings type slowly; body text types quickly
const HEADING_DELAY_MS = 40;
const BODY_DELAY_MS = 12;
const AFTER_HEADING_MS = 150;
const AFTER_BODY_MS = 60;
const BODY_MAX_STEPS = 120; // long paragraphs are typed in at most this many steps

// Selectors
const HEADING = 'h1, h2, h3, .hero-name, .identity-name, .project-screen-title, .cf-title, .page-title';
const SKIP = 'script, style, input, textarea, select, button, i, ' +
             '.side-nav, .term-line, .footer-terminal, .cf-hp, .material-icons, [data-no-type]';

function pause(ms, fast) {
    if (fast.value) return Promise.resolve();
    return new Promise((resolve) => setTimeout(resolve, ms));
}

/* Hides every visible text node in a unit and returns the ones to type now.
   Text inside a closed accordion is returned separately, to type when it opens. */
function collect(unit, state) {
    const now = [];

    const walker = document.createTreeWalker(unit, NodeFilter.SHOW_TEXT, {
        acceptNode(node) {
            if (!node.nodeValue.trim()) return NodeFilter.FILTER_REJECT;
            const parent = node.parentElement;
            if (!parent || parent.closest(SKIP)) return NodeFilter.FILTER_REJECT;
            return NodeFilter.FILTER_ACCEPT;
        },
    });

    while (walker.nextNode()) {
        const node = walker.currentNode;
        const parent = node.parentElement;
        const closed = parent.closest('details:not([open])');

        // Remember the real text, then hide it until its turn
        state.fullText.set(node, node.nodeValue);
        node.nodeValue = '';

        if (closed && !parent.closest('summary')) {
            if (!state.deferred.has(closed)) state.deferred.set(closed, []);
            state.deferred.get(closed).push(node);
        } else {
            now.push(node);
        }
    }

    return now;
}

/* Types one text node, with a cursor after it. */
function typeNode(node, state) {
    return new Promise((resolve) => {
        if (!node.parentNode) return resolve();

        const full = state.fullText.get(node) || '';

        if (state.fast.value) {
            node.nodeValue = full;
            return resolve();
        }

        const isHeading = !!node.parentElement.closest(HEADING);
        const cursor = makeCursor();
        node.parentNode.insertBefore(cursor, node.nextSibling);

        const delay = isHeading ? HEADING_DELAY_MS : BODY_DELAY_MS;
        const chunk = isHeading ? 1 : Math.max(1, Math.ceil(full.length / BODY_MAX_STEPS));
        let i = 0;

        (function step() {
            if (state.fast.value) {
                node.nodeValue = full;
                cursor.remove();
                return resolve();
            }

            i = Math.min(full.length, i + chunk);
            node.nodeValue = full.slice(0, i);

            if (i < full.length) {
                setTimeout(step, delay);
            } else {
                cursor.remove();
                resolve();
            }
        })();
    });
}

/* Types a list of text nodes one after another, with a short pause between them. */
function typeList(nodes, state) {
    return nodes.reduce((chain, node) => {
        const isHeading = !!node.parentElement.closest(HEADING);
        return chain
            .then(() => typeNode(node, state))
            .then(() => pause(isHeading ? AFTER_HEADING_MS : AFTER_BODY_MS, state.fast));
    }, Promise.resolve());
}

export function initTypewriter() {
    // The CV page is excluded from typing
    if (document.querySelector('.cv-page')) return;

    // With reduced motion, show everything at once
    if (reduceMotion()) return;

    const container = snapContainer();
    const unitSelector = container ? '.screen' : 'header, main, footer';

    const state = {
        fullText: new Map(),   // text node -> its real text
        deferred: new Map(),   // closed <details> -> text nodes to type when opened
        fast: { value: false } // becomes true when the visitor skips
    };

    // Hide all text first, so nothing is visible before its turn
    const units = Array.from(document.querySelectorAll(unitSelector));
    const plan = new Map();
    units.forEach((unit) => plan.set(unit, collect(unit, state)));

    // Type each unit when it comes into view
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (!entry.isIntersecting) return;

            const nodes = plan.get(entry.target) || [];
            plan.delete(entry.target);
            observer.unobserve(entry.target);
            typeList(nodes, state);
        });
    }, { root: container || null, threshold: 0 });

    units.forEach((unit) => observer.observe(unit));

    // Closed accordions type their text when they are opened
    document.querySelectorAll('details').forEach((d) => {
        d.addEventListener('toggle', () => {
            if (!d.open || !state.deferred.has(d)) return;

            const nodes = state.deferred.get(d);
            state.deferred.delete(d);
            typeList(nodes, state);
        });
    });

    // Skip: any click, key, touch, or scroll shows all remaining text at once
    ['pointerdown', 'keydown', 'touchstart', 'wheel'].forEach((type) => {
        window.addEventListener(type, () => { state.fast.value = true; }, { once: true, passive: true });
    });
}
