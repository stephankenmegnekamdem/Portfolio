@props(['title', 'intro' => null, 'groups' => []])

<section class="sections timeline-section" data-no-type>

    <header class="tsection-head">
        <div>
            <h2 class="tsection-title">{{ $title }}</h2>
            @if($intro)
                <p class="tsection-intro">{{ $intro }}</p>
            @endif
        </div>
        <span class="tsection-count">{{ count($groups) }}</span>
    </header>

    <div class="tcard-grid">
        @foreach($groups as $group)
            @php
                $items = array_values(array_filter((array) ($group['items'] ?? [])));
                $total = count($items);
            @endphp

            <article class="tcard" tabindex="0">
                <div class="tcard-head">
                    <span class="tcard-avatar">
                        <span class="tcard-initial">{{ mb_strtoupper(mb_substr($group['title'], 0, 1)) }}</span>
                    </span>

                    <div class="tcard-heading">
                        <h3 class="tcard-title">{{ $group['title'] }}</h3>
                        <p class="tcard-sub">{{ $total }} {{ $total === 1 ? 'skill' : 'skills' }}</p>
                    </div>
                </div>

                @if($total)
                    <footer class="tcard-foot">
                        <ul class="tcard-tags">
                            @foreach($items as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                    </footer>
                @endif
            </article>
        @endforeach
    </div>

</section>
