@php
    $name = config('portfolio.short_name');

    $links = [
        ['href' => 'mailto:' . config('portfolio.email'), 'icon' => 'fa-solid fa-envelope',  'label' => 'Email',    'blank' => false],
        ['href' => config('portfolio.linkedin'),          'icon' => 'fa-brands fa-linkedin', 'label' => 'LinkedIn', 'blank' => true],
        ['href' => config('portfolio.github'),            'icon' => 'fa-brands fa-github',   'label' => 'GitHub',   'blank' => true],
    ];
@endphp

<div class="home-main">
    <section class="hero-grid">

        {{-- Name card --}}
        <div class="hero-card hero-card--name">
            <p class="hero-eyebrow">Portfolio Laravel</p>
            <h1 class="hero-name">{{ $name }}</h1>
            <p class="hero-tagline">{{ config('portfolio.tagline') }}</p>
        </div>

        {{-- Photo, logo and contact links --}}
        <div class="hero-card hero-card--profile">
            <img src="{{ asset('images/photo.jpg') }}" alt="{{ $name }}" class="hero-photo">
            <img src="{{ asset('images/logo.svg') }}" alt="Logo" class="hero-logo">

            <div class="hero-links">
                @foreach($links as $link)
                    <a href="{{ $link['href'] }}"
                       aria-label="{{ $link['label'] }}"
                       @if($link['blank']) target="_blank" rel="noopener" @endif>
                        <i class="{{ $link['icon'] }}" aria-hidden="true"></i>
                        <span>{{ $link['label'] }}</span>
                    </a>
                @endforeach
            </div>
        </div>

    </section>
</div>
