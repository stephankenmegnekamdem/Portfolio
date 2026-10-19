//
document.addEventListener('DOMContentLoaded', function () {

    const button = document.getElementById('dropdown-trigger');

    const content = document.getElementById('dropdown-content');

    if (!button || !content) return;

    button.addEventListener('click', function (event) {

        event.stopPropagation();

        content.classList.toggle('hidden');

    });

    document.addEventListener('click', function (event) {

        if (!button.contains(event.target) && !content.contains(event.target)) {

            content.classList.add('hidden');

        }

    });

});
