import { reduceMotion, snapContainer } from '../lib/dom';

/* One fixed section menu for the whole site.
   On desktop the page scrolls inside .snap-container.
   On phones the window scrolls. This file handles both. */
export function initSideNav() {
    const nav = document.querySelector('.side-nav--fixed');
    if (!nav) return;

    const toggle = nav.querySelector('.side-nav-toggle');
    const panel = nav.querySelector('.side-nav-panel');
    const links = panel.querySelectorAll('a[href^="#"]');
    const container = snapContainer();
    const reduce = reduceMotion();

    // The element that actually scrolls: the snap container on desktop, the window on phones
    const scroller = () => {
        if (container && container.scrollHeight > container.clientHeight + 1) {
            return container;
        }
        return window;
    };

    const scrollTopOf = (s) => (s === window ? window.scrollY : s.scrollTop);

    // Distance from the top of the scrollable content to an element
    const offsetOf = (el, s) => {
        if (s === window) {
            return el.getBoundingClientRect().top + window.scrollY;
        }
        return el.getBoundingClientRect().top - s.getBoundingClientRect().top + s.scrollTop;
    };

    const setOpen = (open) => {
        nav.classList.toggle('is-open', open);
        toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
    };

    toggle.addEventListener('click', (event) => {
        event.stopPropagation();
        setOpen(!nav.classList.contains('is-open'));
    });

    links.forEach((link) => {
        link.addEventListener('click', (event) => {
            const id = link.getAttribute('href').slice(1);
            const s = scroller();
            const target = id === 'header' ? null : document.getElementById(id);

            if (id !== 'header' && !target) return;

            event.preventDefault();
            setOpen(false);

            const top = target ? offsetOf(target, s) : 0;
            if (s === window) {
                window.scrollTo({ top, behavior: reduce ? 'auto' : 'smooth' });
            } else {
                s.scrollTo({ top, behavior: reduce ? 'auto' : 'smooth' });
            }
            history.replaceState(null, '', '#' + id);
        });
    });

    // Show the menu once the hero screen has been left
    const onScroll = () => {
        const past = scrollTopOf(scroller()) > window.innerHeight * 0.6;
        document.body.classList.toggle('is-scrolled', past);
    };

    // Underline the section currently on screen
    const sectionIds = [...links]
        .map((link) => link.getAttribute('href').slice(1))
        .filter((id) => id !== 'header');

    const markActive = () => {
        let current = null;
        sectionIds.forEach((id) => {
            const el = document.getElementById(id);
            if (el && el.getBoundingClientRect().top <= window.innerHeight * 0.4) {
                current = id;
            }
        });

        links.forEach((link) => {
            const id = link.getAttribute('href').slice(1);
            const active = id === current;
            link.classList.toggle('is-active', active);
            if (active) {
                link.setAttribute('aria-current', 'true');
            } else {
                link.removeAttribute('aria-current');
            }
        });
    };

    const onAnyScroll = () => {
        onScroll();
        markActive();
    };

    // Listen to both, because only one of them scrolls on any given screen size
    window.addEventListener('scroll', onAnyScroll, { passive: true });
    if (container) {
        container.addEventListener('scroll', onAnyScroll, { passive: true });
    }
    onAnyScroll();

    // Clicking outside, or pressing Escape, closes the menu
    document.addEventListener('click', (event) => {
        if (!nav.contains(event.target)) setOpen(false);
    });
    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') setOpen(false);
    });
}
