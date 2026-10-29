@props([
    'sections' => [
        ['href' => '#header',         'label' => 'Top'],
        ['href' => '#about-me',       'label' => 'About'],
        ['href' => '#education',      'label' => 'Education'],
        ['href' => '#projects',       'label' => 'Projects'],
        ['href' => '#work',           'label' => 'Work'],
        ['href' => '#skills',         'label' => 'Skills'],
        ['href' => '#certifications', 'label' => 'Certifications'],
    ],
    'fixed' => false,
])

<nav class="side-nav {{ $fixed ? 'side-nav--fixed' : '' }}" aria-label="Sections">
    <button type="button" class="side-nav-toggle" aria-expanded="false" aria-label="Open section menu">
        <i class="fa-solid fa-bars" aria-hidden="true"></i>
    </button>

    <div class="side-nav-panel">
        @foreach($sections as $section)
            <a href="{{ $section['href'] }}" class="side-nav-item">
                <span class="side-nav-dot" aria-hidden="true"></span>
                <span class="side-nav-label">{{ $section['label'] }}</span>
            </a>
        @endforeach
    </div>
</nav>
