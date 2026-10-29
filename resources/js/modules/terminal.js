import { makeCursor, typeInto } from '../lib/typing';
import { reduceMotion, snapContainer } from '../lib/dom';

const TYPE_SPEED = 35;   // ms per character
const HOLD_MS = 1600;    // how long a finished command stays visible

const lines = new Set(); // every command line on the page

/* Creates a command line. Each line keeps its own timers. */
function makeLine(className, parent, prepend) {
    const el = document.createElement('div');
    el.className = className;
    el.setAttribute('aria-hidden', 'true');

    const out = document.createElement('span');
    el.appendChild(out);
    el.appendChild(makeCursor());

    if (prepend) parent.prepend(el);
    else parent.appendChild(el);

    const line = { el, out, timer: null, runId: 0, shown: '' };
    lines.add(line);
    return line;
}

/* Stops and hides one line immediately. */
function hide(line) {
    clearTimeout(line.timer);
    line.runId++;
    line.el.classList.remove('is-on');
    line.shown = '';
}

/* Hides every line except the one given, so two commands are never visible together. */
function hideOthers(keep) {
    lines.forEach((line) => {
        if (line !== keep) hide(line);
    });
}

/* Types a command, holds it, then fades it out. */
function play(line, text) {
    hideOthers(line);

    line.shown = text;
    const id = ++line.runId;
    clearTimeout(line.timer);
    line.el.classList.add('is-on');

    const fade = () => line.el.classList.remove('is-on');

    if (reduceMotion()) {
        line.out.textContent = text;
        line.timer = setTimeout(fade, HOLD_MS);
        return;
    }

    line.out.textContent = '';
    let i = 0;
    const step = () => {
        if (id !== line.runId) return;
        line.out.textContent = text.slice(0, ++i);
        if (i < text.length) {
            line.timer = setTimeout(step, TYPE_SPEED);
        } else {
            line.timer = setTimeout(fade, HOLD_MS);
        }
    };
    line.timer = setTimeout(step, TYPE_SPEED);
}

/* Places the fixed line just below the header bar. */
function placeFixedLine() {
    const nav = document.querySelector('.nav');
    const top = nav ? nav.getBoundingClientRect().bottom + 10 : 64;
    document.documentElement.style.setProperty('--term-top', top + 'px');
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

/* End-of-page message: a bar at the top of the footer, like the section bars.
   It types out when the footer comes into view and then stays. */
function initFooterMessage() {
    const footer = document.querySelector('.screen-footer');
    const body = footer ? footer.querySelector('.screen-body') : null;

    if (!footer || !body || body.querySelector('.term-bar--end')) return;

    const bar = document.createElement('div');
    bar.className = 'term-bar term-bar--end';
    bar.setAttribute('aria-hidden', 'true');

    const text = document.createElement('span');
    bar.appendChild(text);
    bar.appendChild(makeCursor());
    body.prepend(bar);

    const message = '> thanks for visiting\n> end of page';

    const observer = new IntersectionObserver((entries, obs) => {
        if (entries[0].isIntersecting) {
            typeInto(text, message, 50, () => bar.classList.add('is-done'));
            obs.disconnect();
        }
    }, { threshold: 0.5 });

    // Show the bar at once, so its space is reserved and the text types into it
    bar.classList.add('is-on');
    observer.observe(footer);
}

export function initTerminal() {
    // The hero and the plain pages use one line fixed under the header
    const fixed = makeLine('term-line', document.body, false);
    placeFixedLine();
    window.addEventListener('resize', placeFixedLine);

    // Plain pages (CV, contact): show the page path once
    if (!snapContainer()) {
        const path = location.pathname.replace(/\/$/, '') || '/home';
        play(fixed, '$ cd ' + path);
        return;
    }

    const hero = document.querySelector('.screen-header');
    const sections = [...document.querySelectorAll('.screen:not(.screen-footer)')];

    // Each section has its own bar at its top. The hero uses the fixed line.
    const bars = new Map();
    sections.forEach((screen) => {
        if (screen === hero) {
            bars.set(screen, fixed);
            return;
        }
        const host = screen.querySelector('.screen-body') || screen;
        bars.set(screen, makeLine('term-bar', host, true));
    });

    let current = null;
    let queued = false;

    const atBottom = () =>
        window.scrollY >= document.documentElement.scrollHeight - window.innerHeight - 4;

    // The current section is the last one whose top has passed the upper part of the screen.
    // At the bottom of the page, the last section is current, even if it is taller than the screen.
    const update = () => {
        queued = false;

        const line = window.innerHeight * 0.4;
        let next = null;

        if (atBottom()) {
            next = sections[sections.length - 1] || null;
        } else {
            sections.forEach((screen) => {
                if (screen.getBoundingClientRect().top <= line) next = screen;
            });
        }

        if (!next || next === current) return;

        current = next;
        play(bars.get(next), labelFor(next));
    };

    const schedule = () => {
        if (queued) return;
        queued = true;
        requestAnimationFrame(update);
    };

    window.addEventListener('scroll', schedule, { passive: true });
    window.addEventListener('resize', schedule);
    update();

    initFooterMessage();
}
