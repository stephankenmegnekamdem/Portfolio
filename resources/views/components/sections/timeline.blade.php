@props(['title', 'intro' => null, 'nodes' => []])

<section class="sections timeline-section" data-no-type>

    <header class="tsection-head">
        <div>
            <h2 class="tsection-title">{{ $title }}</h2>
            @if($intro)
                <p class="tsection-intro">{{ $intro }}</p>
            @endif
        </div>
        <span class="tsection-count">{{ count($nodes) }}</span>
    </header>

    <div class="tcard-grid">
        @foreach($nodes as $node)
            @php
                $label     = $node['title'] ?? '';
                $items     = array_values(array_filter((array) ($node['items'] ?? [])));
                $body      = array_values(array_filter(array_map('trim', (array) ($node['descriptions'] ?? []))));
                $tags      = array_values(array_filter((array) ($node['tags'] ?? [])));
                $tagsLabel = $node['tags_label'] ?? 'Technologies';

                // The first description is the summary. The rest sit behind "More details".
                $summary = $body[0] ?? null;
                $more    = array_slice($body, 1);
                $notes   = array_slice($items, 1);
                $hasMore = !empty($more) || !empty($notes);
                $compact = !$summary && empty($tags) && !$hasMore;
            @endphp

            <article class="tcard {{ $compact ? 'tcard--compact' : '' }}" tabindex="0">

                <div class="tcard-head">
                    <span class="tcard-avatar">
                        @if(!empty($node['icon']))
                            <img src="{{ asset($node['icon']) }}" alt="">
                        @else
                            <span class="tcard-initial">{{ mb_strtoupper(mb_substr($label, 0, 1)) }}</span>
                        @endif
                    </span>

                    <div class="tcard-heading">
                        <h3 class="tcard-title">{{ $label }}</h3>
                        @if(!empty($items))
                            <p class="tcard-sub">{{ $items[0] }}</p>
                        @endif
                    </div>
                </div>

                @if($summary)
                    <p class="tcard-summary">{{ $summary }}</p>
                @endif

                @if($hasMore)
                    <details class="tcard-more">
                        <summary>
                            <span class="tcard-more-open">More details</span>
                            <span class="tcard-more-close">Hide details</span>
                        </summary>
                        <div class="tcard-more-body">
                            @foreach($notes as $note)
                                <p class="tcard-note">{{ $note }}</p>
                            @endforeach
                            @foreach($more as $line)
                                <p>{{ $line }}</p>
                            @endforeach
                        </div>
                    </details>
                @endif

                @if(!empty($tags))
                    <footer class="tcard-foot">
                        <p class="tcard-label">{{ $tagsLabel }}</p>
                        <ul class="tcard-tags">
                            @foreach($tags as $tag)
                                <li>{{ $tag }}</li>
                            @endforeach
                        </ul>
                    </footer>
                @endif

            </article>
        @endforeach
    </div>

</section>
