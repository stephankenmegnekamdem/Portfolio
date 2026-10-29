/* The section menu: one fixed menu for the whole site.
   It appears after the hero, underlines the current section,
   and on phones the "End" link is removed because the footer is hidden there. */
import { reduceMotion } from '../lib/dom';

export function initSideNav() {
    const nav = document.querySelector('.side-nav--fixed');
    if (!nav) return;

    const toggle = nav.querySelector('.side-nav-toggle');
    const panel = nav.querySelector('.side-nav-panel');
    const links = [...panel.querySelectorAll('a[href^="#"]')];
    const phone = window.matchMedia('(max-width: 767px)');
    const reduce = reduceMotion();

    const setOpen = (open) => {
        nav.classList.toggle('is-open', open);
        toggle.setAttribute('aria-expanded', String(open));
    };

    // Phones: the footer is hidden, so "End" is removed
    const syncPhone = () => {
        links.forEach((a) => {
            if (a.getAttribute('href') === '#footer') a.hidden = phone.matches;
        });
    };

    // Distance from the top of the page to a section
    const topOf = (id) => {
        if (id === 'header') return 0;
        if (id === 'footer') return document.documentElement.scrollHeight - window.innerHeight;
        const el = document.getElementById(id);
        return el ? el.getBoundingClientRect().top + window.scrollY : null;
    };

    toggle.addEventListener('click', (event) => {
        event.stopPropagation();
        setOpen(!nav.classList.contains('is-open'));
    });

    links.forEach((link) => {
        link.addEventListener('click', (event) => {
            const id = link.getAttribute('href').slice(1);
            const top = topOf(id);
            if (top === null) return;

            event.preventDefault();
            setOpen(false);
            window.scrollTo({ top, behavior: reduce ? 'auto' : 'smooth' });
            history.replaceState(null, '', '#' + id);
        });
    });

    const sectionIds = links
        .map((a) => a.getAttribute('href').slice(1))
        .filter((id) => id !== 'header' && id !== 'footer');

    // Show after the hero, and underline the section at the upper part of the screen
    const update = () => {
        document.body.classList.toggle('is-scrolled', window.scrollY > window.innerHeight * 0.6);

        const line = window.innerHeight * 0.4;
        let current = null;
        sectionIds.forEach((id) => {
            const el = document.getElementById(id);
            if (el && el.getBoundingClientRect().top <= line) current = id;
        });

        links.forEach((a) => {
            const active = a.getAttribute('href') === '#' + current;
            a.classList.toggle('is-active', active);
            if (active) a.setAttribute('aria-current', 'true');
            else a.removeAttribute('aria-current');
        });
    };

    window.addEventListener('scroll', update, { passive: true });
    window.addEventListener('resize', () => { syncPhone(); update(); });
    if (phone.addEventListener) phone.addEventListener('change', syncPhone);

    // Clicking outside, or pressing Escape, closes the panel
    document.addEventListener('click', (event) => {
        if (!nav.contains(event.target)) setOpen(false);
    });
    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') setOpen(false);
    });

    syncPhone();
    update();
}
