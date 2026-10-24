<script>
    // Set the theme before the page paints, so there is no flash of the wrong colours.
    // Saved choice first; if there is none, follow the operating system setting.
    (function () {
        var choice = null;
        try {
            choice = localStorage.getItem('theme');
        } catch (e) {
            // Storage blocked (private mode, some browsers). Use the system setting.
        }

        if (choice !== 'light' && choice !== 'dark') {
            var systemLight = window.matchMedia &&
                window.matchMedia('(prefers-color-scheme: light)').matches;
            choice = systemLight ? 'light' : 'dark';
        }

        document.documentElement.setAttribute('data-theme', choice);
    })();
</script>
<meta charset="utf-8">
<title>@yield('title', config('portfolio.name') . ' — Portfolio')</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="@yield('description', 'Digital portfolio')">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
      integrity="PASTE_THE_VERIFIED_HASH_HERE"
      crossorigin="anonymous">
@vite(['resources/css/app.css', 'resources/js/app.js'])
@stack('head')
