import { reduceMotion, snapContainer } from '../lib/dom';

/* The section menus on the home page. Each screen has its own copy of the menu.
   One listener on the document handles closing for all of them. */
export function initSideNav() {
    const navs = document.querySelectorAll('.side-nav');
    if (!navs.length) return;

    const container = snapContainer();
    const reduce = reduceMotion();

    const setOpen = (nav, open) => {
        nav.classList.toggle('is-open', open);
        nav.querySelector('.side-nav-toggle').setAttribute('aria-expanded', open ? 'true' : 'false');
    };

    navs.forEach((nav) => {
        const toggle = nav.querySelector('.side-nav-toggle');
        const panel = nav.querySelector('.side-nav-panel');
        if (!toggle || !panel) return;

        const screen = nav.closest('.screen');
        const links = panel.querySelectorAll('a[href^="#"]');

        // Open or close. stopPropagation stops the document listener closing it straight away.
        toggle.addEventListener('click', (event) => {
            event.stopPropagation();
            setOpen(nav, !nav.classList.contains('is-open'));
        });

        // Scroll to the chosen section and close the menu
        links.forEach((link) => {
            link.addEventListener('click', (event) => {
                const id = link.getAttribute('href').slice(1);
                const target = document.getElementById(id);
                if (!target || !container) return;

                event.preventDefault();
                setOpen(nav, false);

                const screenEl = target.closest('.screen') || target;
                const offset = screenEl.getBoundingClientRect().top
                             - container.getBoundingClientRect().top;

                container.scrollTo({
                    top: container.scrollTop + offset,
                    behavior: reduce ? 'auto' : 'smooth',
                });

                history.replaceState(null, '', '#' + id);
            });
        });

        // Highlight the link for the section that belongs to this screen
        if (screen) {
            let activeId = null;
            links.forEach((link) => {
                const id = link.getAttribute('href').slice(1);
                const target = document.getElementById(id);
                if (!activeId && target && screen.contains(target)) {
                    activeId = id;
                }
            });

            links.forEach((link) => {
                link.classList.toggle('is-active', link.getAttribute('href') === '#' + activeId);
            });
        }
    });

    // Clicking outside a menu closes it
    document.addEventListener('click', (event) => {
        navs.forEach((nav) => {
            if (!nav.contains(event.target)) setOpen(nav, false);
        });
    });

    // Escape closes all menus
    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') {
            navs.forEach((nav) => setOpen(nav, false));
        }
    });
}
