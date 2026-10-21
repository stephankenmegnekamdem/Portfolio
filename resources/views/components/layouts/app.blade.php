<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('title', config('portfolio.name') . ' — Portfolio')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('description', 'Digital portfolio')">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('head')
</head>
<body>

    <main class="snap-container">

        <section class="screen screen-header">
            <x-header />
            <div class="screen-body">
                <!-- intro info goes here -->
                @yield('intro')
            </div>
        </section>

        @yield('content')

        <section class="screen screen-footer">
            <div class="screen-body">
                @yield('outro')
            </div>
            <x-footer />
        </section>

    </main>

    @stack('scripts')
</body>
</html>
