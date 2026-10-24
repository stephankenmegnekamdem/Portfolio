/* Theme switcher.
   Cycles: System (no saved choice) -> Light -> Dark -> System.
   The page always carries data-theme="light" or "dark". When the visitor is on
   System, the page follows the operating setting, including live changes. */

const ORDER = ['system', 'light', 'dark'];
const LABELS = { system: 'Theme: System', light: 'Theme: Light', dark: 'Theme: Dark' };

function readSaved() {
    try {
        const saved = localStorage.getItem('theme');
        return saved === 'light' || saved === 'dark' ? saved : 'system';
    } catch (e) {
        return 'system';
    }
}

function save(choice) {
    try {
        if (choice === 'system') {
            localStorage.removeItem('theme');
        } else {
            localStorage.setItem('theme', choice);
        }
    } catch (e) {
        // Storage blocked: the choice still applies for this visit
    }
}

export function initTheme() {
    const button = document.querySelector('[data-theme-toggle]');
    if (!button) return;

    const root = document.documentElement;
    const label = button.querySelector('.theme-toggle-label');
    const systemQuery = window.matchMedia('(prefers-color-scheme: light)');

    let current = readSaved();

    // The theme that applies for the current choice
    const effective = () => {
        if (current === 'light' || current === 'dark') return current;
        return systemQuery.matches ? 'light' : 'dark';
    };

    const render = () => {
        if (label) label.textContent = LABELS[current];
        button.setAttribute('aria-label', 'Change colour theme. ' + LABELS[current]);
    };

    const applyTheme = () => {
        root.setAttribute('data-theme', effective());
    };

    button.addEventListener('click', () => {
        current = ORDER[(ORDER.indexOf(current) + 1) % ORDER.length];
        save(current);
        applyTheme();
        render();
    });

    // Follow the operating system live, but only while the visitor is on System
    systemQuery.addEventListener('change', () => {
        if (current === 'system') applyTheme();
    });

    render();
}
