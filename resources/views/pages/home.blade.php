@extends('components.layouts.app')

@section('title', 'Home — ' . config('portfolio.name'))

{{-- Hero and scroll arrow, rendered inside the header slot in the layout --}}
@section('hero')
    <br>
    <br>
    <x-sections.hero />
    <x-ui.scroll-cue />
@endsection

@section('content')

@php
    $educationNodes = $sections['education'] ?? [];

    // Projects: detailed text from sections, screenshot from the projects list.
    // Both lists must be in the same order; they are matched by position.
    $projectNodes = collect($sections['projects'] ?? [])->values()->map(function ($p, $i) use ($projects) {
        return [
            'title'        => $p['title'],
            'icon'         => $projects[$i]['image'] ?? ($p['icon'] ?? null),
            'items'        => $p['items'] ?? [],
            'descriptions' => $p['descriptions'] ?? [],
        ];
    })->all();

    // Work: each entry becomes its own circle
    $workNodes = collect($sections['work']['items'] ?? [])->map(function ($item) use ($sections) {
        return [
            'title' => $item,
            'icon'  => $sections['work']['icon'] ?? null,
            'descriptions' => $sections['work']['descriptions'] ?? [],
        ];
    })->all();

    // Skills: each skill becomes its own circle
    $skillNodes = collect($sections['skills']['items'] ?? [])->map(function ($item) {
        return ['title' => trim($item, " |")];
    })->all();

    $certs = $sections['certifications'] ?? [];
@endphp

{{-- Screen 1: menu + personal --}}
@if(isset($sections['personal']))
    @php $section = $sections['personal']; @endphp

    <section class="screen" id="about-me">
        <x-layout.side-nav />
        <div class="screen-body">

            <div class="personal-layout">

                {{-- Left: identity --}}
                <div class="identity-card">
                    @if(!empty($section['icon']))
                        <img class="identity-photo" src="{{ asset($section['icon']) }}" alt="">
                    @endif

                    <div class="identity-text">
                        <h2 class="identity-name">{{ $section['title'] }}</h2>

                        <p class="identity-role">{{ $section['items'][0] ?? '' }}</p>

                        @if(!empty($section['nationality']))
                            <a class="identity-nationality"
                               href="{{ $section['nationality']['url'] }}"
                               target="_blank" rel="noopener">
                                {{ $section['nationality']['label'] }}
                            </a>
                        @endif
                    </div>
                </div>

                {{-- Right: expandable panels --}}
                <div class="personal-accordion">

                    <details class="accordion-item">
                        <summary>
                            <span class="accordion-title">
                                Hey 👋
                                <span class="accordion-hint">click to read</span>
                            </span>
                        </summary>
                        <div class="accordion-body">
                            <p>{{ implode(' ', (array) $section['descriptions']) }}</p>
                        </div>
                    </details>

                    <details class="accordion-item">
                        <summary>
                            <span class="accordion-title">
                                Facts
                                <span class="accordion-hint">click to read</span>
                            </span>
                        </summary>
                        <div class="accordion-body">
                            <ul>
                                @foreach($section['traits'] ?? [] as $trait)
                                    <li>{{ $trait }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </details>

                    <details class="accordion-item">
                        <summary>
                            <span class="accordion-title">
                                Interests
                                <span class="accordion-hint">click to see</span>
                            </span>
                        </summary>
                        <div class="accordion-body">
                            <ul class="interest-tags">
                                @foreach($section['interests'] ?? [] as $interest)
                                    <li>{{ $interest }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </details>

                </div>
            </div>
        </div>
    </section>
@endif

{{-- Screen 2: education --}}
@if(!empty($educationNodes))
    <section class="screen" id="education">
        <x-layout.side-nav />
        <div class="screen-body">
            <x-sections.timeline title="Education" :nodes="$educationNodes" />
        </div>
    </section>
@endif

{{-- Screen 3: projects --}}
@if(!empty($projectNodes))
    <section class="screen">
        <x-layout.side-nav />
        <div class="screen-body" id="projects">
            <x-sections.timeline title="Projects" :nodes="$projectNodes" />
        </div>
    </section>
@endif

{{-- Screen 4: work experience --}}
@if(!empty($workNodes))
    <section class="screen">
        <x-layout.side-nav />
        <div class="screen-body" id="work">
            <x-sections.timeline title="Work Experience" :nodes="$workNodes" />
        </div>
    </section>
@endif

{{-- Screen 5: skills --}}
@if(!empty($skillNodes))
    <section class="screen">
        <x-layout.side-nav />
        <div class="screen-body" id="skills">
            <x-sections.timeline title="Skills" :nodes="$skillNodes" />
        </div>
    </section>
@endif

{{-- Certifications: plain images --}}
@if(!empty($certs))
    <section class="screen">
        <div class="screen-body">
            <x-layout.side-nav />
            <section class="sections" id="certifications">
                <h2 class="my-black">Certifications</h2>
                @foreach($certs as $cert)
                    <img class="my-certifications" src="{{ asset($cert) }}" alt="Certification">
                @endforeach
            </section>
        </div>
    </section>
@endif

@endsection
