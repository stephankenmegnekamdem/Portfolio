/* Any element with data-print opens the browser's print dialog. */
export function initPrintButton() {
    document.addEventListener('click', (event) => {
        if (event.target.closest('[data-print]')) {
            window.print();
        }
    });
}
