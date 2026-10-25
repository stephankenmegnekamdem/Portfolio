@props([
    'sections' => [
        ['href' => '#header',         'label' => 'Top'],
        ['href' => '#about-me',       'label' => 'About'],
        ['href' => '#education',      'label' => 'Education'],
        ['href' => '#projects',       'label' => 'Projects'],
        ['href' => '#work',           'label' => 'Work'],
        ['href' => '#skills',         'label' => 'Skills'],
        ['href' => '#certifications', 'label' => 'Certifications'],
        ['href' => '#footer',         'label' => 'End'],
    ],
    'fixed' => false,
])

<nav class="side-nav {{ $fixed ? 'side-nav--fixed' : '' }}" aria-label="Sections">
    <button type="button" class="side-nav-toggle" aria-expanded="false" aria-label="Open section menu">
        <i class="fa-solid fa-bars" aria-hidden="true"></i>
    </button>

    <div class="side-nav-panel">
        @foreach($sections as $section)
            <a href="{{ $section['href'] }}">{{ $section['label'] }}</a>
        @endforeach
    </div>
</nav>
