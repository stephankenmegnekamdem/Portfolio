<!DOCTYPE html>
<html lang="en">
<head>
    @include('components.layouts.partials.head')
</head>
<body class="plain-page">

    <x-layout.header />

    <main>
        @yield('content')
    </main>

    <x-layout.footer />

    @stack('scripts')
</body>
</html>
