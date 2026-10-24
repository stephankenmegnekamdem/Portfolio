<header>

<div class="nav">
    @php
        $navLinks = [
            ['route' => 'home',     'label' => 'Home'],
            ['route' => 'projects', 'label' => 'Projects'],
            ['route' => 'cv',       'label' => 'CV'],
            ['route' => 'contact',  'label' => 'Contact'],
        ];
    @endphp

    @foreach($navLinks as $link)
        <a href="{{ route($link['route']) }}"
           class="nav-link {{ request()->routeIs($link['route']) ? 'is-active' : '' }}"
           @if(request()->routeIs($link['route'])) aria-current="page" @endif>{{ $link['label'] }}</a>
    @endforeach

    @if(request()->routeIs('cv'))
        <button type="button" data-print
            class="inline-flex items-center gap-1 bg-transparent border-0 p-0 cursor-pointer
                   text-white/75 hover:text-white font-normal
                   hover:underline decoration-[#FF6B1A] underline-offset-[6px]">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
             fill="none" stroke="currentColor" stroke-width="2"
             stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <path d="M12 3v12"/>
            <path d="m7 10 5 5 5-5"/>
            <path d="M5 21h14"/>
        </svg>
        CV
        </button>
    @endif
        <button type="button" class="theme-toggle" data-theme-toggle aria-label="Change colour theme">
            <i class="fa-solid fa-circle-half-stroke" aria-hidden="true"></i>
            <span class="theme-toggle-label">Theme</span>
        </button>
</div>

{{-- Page-specific content (hero on home, project grid on projects) comes in through the slot --}}
{{ $slot }}

</header>
