/* Shared typing helpers used by the terminal and the typewriter.
   Both show text one character at a time, with a blinking cursor. */

export function makeCursor() {
    const cursor = document.createElement('span');
    cursor.className = 'term-cursor';
    cursor.textContent = '_';
    return cursor;
}

/* Types `text` into `el` at `speed` ms per character, then calls `done`.
   Used by the terminal. */
export function typeInto(el, text, speed, done) {
    let i = 0;

    (function step() {
        el.textContent = text.slice(0, i);

        if (i++ < text.length) {
            setTimeout(step, speed);
        } else if (done) {
            done();
        }
    })();
}
