<!DOCTYPE html>
<html lang="en">
<head>
    @include('components.layouts.partials.head')
</head>
<body>

    <main class="snap-container">
        @hasSection('sidenav')
        @yield('sidenav')
        @else
            <x-layout.side-nav fixed />
         @endif
        <section class="screen screen-header" data-term="@yield('term', './portfolio --start')">
            <x-layout.header>
                @yield('hero')
            </x-layout.header>
            <div class="screen-body">
                <!-- intro info goes here -->
                @yield('intro')
            </div>
        </section>

        @yield('content')

            <section class="screen screen-footer" id="footer">
                <div class="screen-body">
                    @yield('outro')
                </div>
                <x-layout.footer />
            </section>

    </main>

    @stack('scripts')
</body>
</html>
