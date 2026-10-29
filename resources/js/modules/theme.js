/* Theme: starts on the computer's setting and follows it live.
   A click switches to the other theme. The choice is kept in sessionStorage,
   so it carries across pages during the same visit and resets when the tab closes. */

const KEY = 'theme-choice';
const LABELS = { light: 'Light', dark: 'Dark' };

function readChoice() {
    try {
        const saved = sessionStorage.getItem(KEY);
        return saved === 'light' || saved === 'dark' ? saved : null;
    } catch (e) {
        return null; // storage blocked: fall back to the computer's setting
    }
}

function writeChoice(value) {
    try {
        sessionStorage.setItem(KEY, value);
    } catch (e) {
        // storage blocked: the choice still applies on this page
    }
}

export function initTheme() {
    const root = document.documentElement;
    const button = document.querySelector('[data-theme-toggle]');
    const systemQuery = window.matchMedia('(prefers-color-scheme: light)');

    let choice = readChoice();

    const effective = () => choice || (systemQuery.matches ? 'light' : 'dark');

    const render = () => {
        const theme = effective();
        root.setAttribute('data-theme', theme);

        if (button) {
            const label = button.querySelector('.theme-toggle-label');
            if (label) label.textContent = LABELS[theme];

            const next = theme === 'light' ? 'dark' : 'light';
            button.setAttribute('aria-label', 'Switch to ' + next + ' theme');
        }
    };

    if (button) {
        button.addEventListener('click', () => {
            choice = effective() === 'light' ? 'dark' : 'light';
            writeChoice(choice);
            render();
        });
    }

    // Follow the computer live, unless the visitor has chosen a theme
    systemQuery.addEventListener('change', () => {
        if (!choice) render();
    });

    render();
}
