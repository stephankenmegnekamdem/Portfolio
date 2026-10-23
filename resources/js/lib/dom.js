/* Small helpers shared by several modules.
   Each one is a plain function, so it's easy to test and to reuse. */

export function snapContainer() {
    return document.querySelector('.snap-container');
}

export function reduceMotion() {
    return window.matchMedia('(prefers-reduced-motion: reduce)').matches;
}
