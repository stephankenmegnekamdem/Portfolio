@props(['title', 'nodes' => []])

<section class="sections timeline-section" style="--n: {{ max(count($nodes), 1) }};">
    <h2 class="my-black">{{ $title }}</h2>

    @if(count($nodes))
        <p class="timeline-hint">Click a circle to open its details</p>
    @endif

    <ol class="timeline">
        @foreach($nodes as $node)
            @php
                $label = $node['title'] ?? '';
                $items = array_values(array_filter((array) ($node['items'] ?? [])));
                $body  = array_values(array_filter(array_map('trim', (array) ($node['descriptions'] ?? []))));
                $expandable = !empty($items) || !empty($body);
            @endphp

            <li class="timeline-node">
                <details class="node {{ $expandable ? '' : 'node--static' }}">
                    <summary class="node-summary">
                        <span class="node-circle">
                            @if(!empty($node['icon']))
                                <img src="{{ asset($node['icon']) }}" alt="">
                            @else
                                <span class="node-initial">{{ mb_strtoupper(mb_substr($label, 0, 1)) }}</span>
                            @endif

                            @if($expandable)
                                <span class="node-plus" aria-hidden="true">+</span>
                            @endif
                        </span>

                        <span class="node-title my-black">{{ $label }}</span>

                        @if($expandable)
                            <span class="node-hint">Details</span>
                        @endif
                    </summary>

                    @if($expandable)
                        <div class="node-body my-grey">
                            @if(!empty($items))
                                <ul>
                                    @foreach($items as $item)
                                        <li>{{ $item }}</li>
                                    @endforeach
                                </ul>
                            @endif

                            @foreach($body as $line)
                                <p>{{ $line }}</p>
                            @endforeach
                        </div>
                    @endif
                </details>
            </li>
        @endforeach
    </ol>
</section>
