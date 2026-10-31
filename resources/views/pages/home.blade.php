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

    // Projects: summary and details from sections, image and technologies from the projects list.
    // Both lists must be in the same order; they are matched by position.
    $projectNodes = collect($sections['projects'] ?? [])->values()->map(function ($p, $i) use ($projects) {
        $project = $projects[$i] ?? [];

        return [
            'title'        => $p['title'],
            'icon'         => $project['image'] ?? ($p['icon'] ?? null),
            'items'        => $p['items'] ?? [],
            'descriptions' => $p['descriptions'] ?? [],
            'tags'         => $project['technologies'] ?? [],
            'tags_label'   => 'Built with',
        ];
    })->all();

    // Work: each entry becomes its own card
    $workNodes = collect($sections['work']['items'] ?? [])->map(function ($item) use ($sections) {
        return [
            'title'        => $item,
            'icon'         => $sections['work']['icon'] ?? null,
            'descriptions' => $sections['work']['descriptions'] ?? [],
        ];
    })->all();

    // Skills and languages come from portfolio.php, grouped for display
    $skillGroups = config('portfolio.skill_groups', []);
    $languages   = config('portfolio.languages', []);

    $certs        = $sections['certifications'] ?? [];
    $recognitions = $sections['recognitions'] ?? [];
@endphp

{{-- About me: visible straight away --}}
@if(isset($sections['personal']))
    @php $section = $sections['personal']; @endphp

    <section class="screen" id="about-me">
        <div class="screen-body">

            <div class="personal-layout" data-no-type>

                <aside class="identity-card">
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
                </aside>

                <div class="about-grid">

                    <article class="about-panel about-panel--intro" tabindex="0">
                        <h3 class="about-heading">Hey 👋</h3>
                        @foreach((array) $section['descriptions'] as $line)
                            <p>{{ $line }}</p>
                        @endforeach
                    </article>

                    <article class="about-panel" tabindex="0">
                        <h3 class="about-heading">Fun Facts</h3>
                        <ul class="about-list">
                            @foreach($section['traits'] ?? [] as $trait)
                                <li>{{ $trait }}</li>
                            @endforeach
                        </ul>
                    </article>

                    <article class="about-panel" tabindex="0">
                        <h3 class="about-heading">Interests</h3>
                        <ul class="about-tags">
                            @foreach($section['interests'] ?? [] as $interest)
                                <li>{{ $interest }}</li>
                            @endforeach
                        </ul>
                    </article>

                </div>
            </div>
        </div>
    </section>
@endif

{{-- Education --}}
@if(!empty($educationNodes))
    <section class="screen" id="education">
        <div class="screen-body">
            <x-sections.timeline
                title="Education"
                intro="From A-Level studies in Cameroon to my current exchange in Paris, here is where I have learned."
                :nodes="$educationNodes" />
        </div>
    </section>
@endif

{{-- Projects --}}
@if(!empty($projectNodes))
    <section class="screen">
        <div class="screen-body" id="projects">
            <x-sections.timeline
                title="Projects"
                intro="Things I have built to learn and to solve real problems. Each card gives the main point. Open 'More details' for the rest."
                :nodes="$projectNodes" />
        </div>
    </section>
@endif

{{-- Work experience --}}
@if(!empty($workNodes))
    <section class="screen">
        <div class="screen-body" id="work">
            <x-sections.timeline
                title="Work Experience"
                intro="Teaching children aged 6 to 14, and interpreting between staff, parents and students."
                :nodes="$workNodes" />
        </div>
    </section>
@endif

{{-- Skills, grouped by category --}}
@if(!empty($skillGroups))
    <section class="screen">
        <div class="screen-body" id="skills">
            <x-sections.skill-groups
                title="Skills"
                intro="The tools and abilities I use most, grouped by area."
                :groups="$skillGroups" />
        </div>
    </section>
@endif

{{-- Languages --}}
@if(!empty($languages))
    <section class="screen" id="languages">
        <div class="screen-body">
            <x-sections.languages
                title="Languages"
                intro="The languages I speak, and how well I use each one."
                :languages="$languages" />
        </div>
    </section>
@endif

{{-- Certifications --}}
@if(!empty($certs))
    <section class="screen">
        <div class="screen-body">

            <section class="sections certifications" id="certifications" data-no-type>
                <header class="tsection-head">
                    <div>
                        <h2 class="tsection-title">Certifications</h2>
                        <p class="tsection-intro">Short programmes in artificial intelligence and machine learning, completed in 2025.</p>
                    </div>
                    <span class="tsection-count">{{ count($certs) }}</span>
                </header>

                <div class="cert-list">
                    @foreach($certs as $cert)
                        @php
                            // Each entry is either a plain image path, or an array with image, title and description
                            $image = is_array($cert) ? $cert['image'] : $cert;
                            $title = is_array($cert) ? ($cert['title'] ?? null) : null;
                            $desc  = is_array($cert) ? ($cert['description'] ?? null) : null;
                        @endphp

                        <figure class="cert-item">
                            <img class="my-certifications"
                                 src="{{ asset($image) }}"
                                 alt="{{ $title ?? 'Certification' }}"
                                 loading="lazy">

                            @if($title || $desc)
                                <figcaption class="cert-caption">
                                    @if($title)
                                        <strong>{{ $title }}</strong>
                                    @endif
                                    @if($desc)
                                        <p>{{ $desc }}</p>
                                    @endif
                                </figcaption>
                            @endif
                        </figure>
                    @endforeach
                </div>
            </section>

        </div>
    </section>
@endif

{{-- Recognition --}}
@if(!empty($recognitions))
    <section class="screen">
        <div class="screen-body">

            <section class="sections recognitions" id="recognitions" data-no-type>
                <header class="tsection-head">
                    <div>
                        <h2 class="tsection-title">Recognition</h2>
                        <p class="tsection-intro">Recognition for taking part in an initiative beyond my coursework.</p>
                    </div>
                    <span class="tsection-count">{{ count($recognitions) }}</span>
                </header>

                <div class="cert-list">
                    @foreach($recognitions as $item)
                        <figure class="cert-item">
                            <img class="my-certifications"
                                 src="{{ asset($item['image']) }}"
                                 alt="{{ $item['title'] }}"
                                 loading="lazy">

                            <figcaption class="cert-caption">
                                <strong>{{ $item['title'] }}</strong>
                                <p>{{ $item['description'] }}</p>
                            </figcaption>
                        </figure>
                    @endforeach
                </div>
            </section>

        </div>
    </section>
@endif

@endsection
