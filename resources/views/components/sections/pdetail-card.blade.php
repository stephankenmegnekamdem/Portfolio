@props(['block'])

<article class="pdetail-card pdetail-card--{{ $block['type'] }}" tabindex="0">
    <h3 class="pdetail-label">{{ $block['label'] }}</h3>

    @if($block['type'] === 'text')
        <p class="pdetail-text">{{ $block['value'] }}</p>

    @elseif($block['type'] === 'tags')
        <ul class="pdetail-tags">
            @foreach((array) $block['value'] as $item)
                <li>{{ $item }}</li>
            @endforeach
        </ul>

    @else
        <ul class="pdetail-list">
            @foreach((array) $block['value'] as $item)
                <li>{{ $item }}</li>
            @endforeach
        </ul>
    @endif
</article>
