@props([
    'sections' => [
        ['href' => '#header',       'label' => 'go-to-top'],
        ['href' => '#about-me',       'label' => 'About'],
        ['href' => '#education',      'label' => 'Education'],
        ['href' => '#projects',       'label' => 'Projects'],
        ['href' => '#work',           'label' => 'Work'],
        ['href' => '#skills',         'label' => 'Skills'],
        ['href' => '#certifications', 'label' => 'Certifications'],
        ['href' => '#footer',       'label' => 'go-to-end'],
    ],
])

<nav class="side-nav" aria-label="Sections">
    <button type="button" class="side-nav-toggle" aria-expanded="false" aria-label="Open section menu">
        <i class="fa-solid fa-bars" aria-hidden="true"></i>
    </button>

    <div class="side-nav-panel">
        @foreach($sections as $section)
            <a href="{{ $section['href'] }}">{{ $section['label'] }}</a>
        @endforeach
    </div>
</nav>
