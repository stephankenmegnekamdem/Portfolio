@props(['project'])

@php
    use Illuminate\Support\Str;

    $id    = Str::slug($project['title']);
    $shots = !empty($project['screenshots'])
                ? $project['screenshots']
                : array_filter([$project['image'] ?? null]);

    // "open" blocks are the main story and show at once.
    // The others sit behind one button, so the page stays calm.
    $blocks = array_filter([
        ['label' => 'What it is',                  'value' => $project['description'] ?? null, 'type' => 'text', 'open' => true],
        ['label' => 'Technologies used',           'value' => $project['technologies'] ?? [],  'type' => 'tags', 'open' => true],
        ['label' => 'Why it matters',              'value' => $project['why'] ?? null,         'type' => 'text', 'open' => true],
        ['label' => 'How to ship it as a product', 'value' => $project['ship'] ?? [],          'type' => 'list', 'open' => false],
        ['label' => 'What to add next',            'value' => $project['next'] ?? [],          'type' => 'list', 'open' => false],
        ['label' => 'What it proves',              'value' => $project['proves'] ?? [],        'type' => 'tags', 'open' => false],
    ], fn ($b) => !empty($b['value']));

    $main = array_values(array_filter($blocks, fn ($b) => $b['open']));
    $more = array_values(array_filter($blocks, fn ($b) => !$b['open']));
@endphp

<section class="screen project-screen" id="{{ $id }}" data-no-type>
    <div class="screen-body">

        <header class="pdetail-head">
            <h2 class="project-screen-title">{{ $project['title'] }}</h2>

            @if(!empty($project['url']))
                <a class="pdetail-link" href="{{ $project['url'] }}" target="_blank" rel="noopener">
                    View the code <span aria-hidden="true">→</span>
                </a>
            @endif
        </header>

        {{-- Screenshots: horizontal strip, open full size on click --}}
        <div class="shots">
            @foreach($shots as $shot)
                <a href="{{ asset($shot) }}" target="_blank" rel="noopener" class="shot">
                    <img src="{{ asset($shot) }}"
                         alt="{{ $project['title'] }} screenshot"
                         loading="lazy">
                </a>
            @endforeach
        </div>

        {{-- Main information: visible straight away --}}
        @if(!empty($main))
            <div class="pdetail-grid">
                @foreach($main as $block)
                    <x-sections.pdetail-card :block="$block" />
                @endforeach
            </div>
        @endif

        {{-- Everything else: one button opens and closes it --}}
        @if(!empty($more))
            <details class="pdetail-more">
                <summary>
                    <span class="pdetail-more-open">Show more: shipping, next steps and skills proven</span>
                    <span class="pdetail-more-close">Hide the extra details</span>
                </summary>

                <div class="pdetail-grid">
                    @foreach($more as $block)
                        <x-sections.pdetail-card :block="$block" />
                    @endforeach
                </div>
            </details>
        @endif

    </div>
</section>
