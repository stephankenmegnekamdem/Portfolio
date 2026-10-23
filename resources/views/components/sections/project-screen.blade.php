@props(['project'])

@php
    use Illuminate\Support\Str;

    $id    = Str::slug($project['title']);
    $shots = $project['screenshots'] ?? [$project['image']];

    // Each dropdown reads one key from the project.
    // Empty keys are skipped, so a project shows only what you filled in.
    $sections = [
        ['label' => 'What it is',                  'value' => $project['description'] ?? null],
        ['label' => 'Technologies used',           'value' => $project['technologies'] ?? null],
        ['label' => 'Why it matters',              'value' => $project['why'] ?? null],
        ['label' => 'How to ship it as a product', 'value' => $project['ship'] ?? null],
        ['label' => 'What to add next',            'value' => $project['next'] ?? null],
        ['label' => 'What it proves',              'value' => $project['proves'] ?? null],
    ];
@endphp

<section class="screen project-screen" id="{{ $id }}">
    <div class="screen-body">

        <h2 class="project-screen-title">{{ $project['title'] }}</h2>

        {{-- Screenshot catalogue: horizontal strip, tap to open full size --}}
        <div class="shots">
            @foreach($shots as $shot)
                <a href="{{ asset($shot) }}" target="_blank" rel="noopener" class="shot">
                    <img src="{{ asset($shot) }}"
                         alt="{{ $project['title'] }} screenshot"
                         loading="lazy">
                </a>
            @endforeach
        </div>

        {{-- Zigzag dropdowns --}}
        <div class="zigzag">
            @foreach($sections as $s)
                @if(!empty($s['value']))
                    <details class="accordion-item">
                        <summary>{{ $s['label'] }}</summary>
                        <div class="accordion-body">
                            @if(is_array($s['value']))
                                <ul>
                                    @foreach($s['value'] as $item)
                                        <li>{{ $item }}</li>
                                    @endforeach
                                </ul>
                            @else
                                <p>{{ $s['value'] }}</p>
                            @endif
                        </div>
                    </details>
                @endif
            @endforeach
        </div>

        @if(!empty($project['url']))
            <p class="project-screen-link">
                <a href="{{ $project['url'] }}" target="_blank" rel="noopener">View the code →</a>
            </p>
        @endif

    </div>
</section>
