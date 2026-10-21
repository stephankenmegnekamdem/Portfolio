<header>


    <a href="{{ route('home') }}"
       style="{{ request()->routeIs('home') ? 'color:#FFFFFF; font-weight:700; text-decoration:underline; text-decoration-color:#FF6B1A; text-underline-offset:6px;' : 'color:rgba(255,255,255,0.75); font-weight:400; text-decoration:none;' }}">Home</a>
    <a href="{{ route('projects') }}"
       style="{{ request()->routeIs('projects') ? 'color:#FFFFFF; font-weight:700; text-decoration:underline; text-decoration-color:#FF6B1A; text-underline-offset:6px;' : 'color:rgba(255,255,255,0.75); font-weight:400; text-decoration:none;' }}">Projects</a>
    <a href="{{ route('cv') }}"
       style="{{ request()->routeIs('cv') ? 'color:#FFFFFF; font-weight:700; text-decoration:underline; text-decoration-color:#FF6B1A; text-underline-offset:6px;' : 'color:rgba(255,255,255,0.75); font-weight:400; text-decoration:none;' }}">CV</a>
    <a href="{{ route('contact') }}"
       style="{{ request()->routeIs('contact') ? 'color:#FFFFFF; font-weight:700; text-decoration:underline; text-decoration-color:#FF6B1A; text-underline-offset:6px;' : 'color:rgba(255,255,255,0.75); font-weight:400; text-decoration:none;' }}">Contact</a>

    @if(request()->routeIs('cv'))
    <button onclick="window.print()"
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

</header>
