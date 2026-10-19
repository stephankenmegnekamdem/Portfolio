@props(['sections' => []])

<nav>
    <div class="relative">
                <button class="my-black" type="button" id="dropdown-trigger" aria-label="Open menu">
                   <svg xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="h-6 w-6">
                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>

                <ul id="dropdown-content">
                    <li><a href="#about-me">About</a></li>
                    <li><a href="#education">Education</a></li>
                    <li><a href="#work">Work</a></li>
                    <li><a href="#projects">Projects</a></li>
                    <li><a href="#skills">Skills</a></li>
                    <li><a href="#certifications">Certifications</a></li>
                </ul>
            </div>
</nav>
