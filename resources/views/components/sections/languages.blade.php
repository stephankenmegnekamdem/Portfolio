@props(['title', 'intro' => null, 'languages' => []])

<section class="sections timeline-section" data-no-type>

    <header class="tsection-head">
        <div>
            <h2 class="tsection-title">{{ $title }}</h2>
            @if($intro)
                <p class="tsection-intro">{{ $intro }}</p>
            @endif
        </div>
        <span class="tsection-count">{{ count($languages) }}</span>
    </header>

    <div class="tcard-grid">
        @foreach($languages as $lang)
            @php
                $name    = $lang['name'] ?? '';
                $level   = $lang['level'] ?? '';
                $percent = max(0, min(100, (int) ($lang['percent'] ?? 0)));
            @endphp

            <article class="tcard tcard--lang" tabindex="0">
                <div class="tcard-head">
                    <span class="tcard-avatar">
                        <span class="tcard-initial">{{ mb_strtoupper(mb_substr($name, 0, 1)) }}</span>
                    </span>

                    <div class="tcard-heading">
                        <h3 class="tcard-title">{{ $name }}</h3>
                        <p class="tcard-sub">{{ $level }}</p>
                    </div>
                </div>

                <div class="lang-meter" role="img" aria-label="{{ $name }}: {{ $level }}">
                    <span class="lang-meter-fill" style="width: {{ $percent }}%"></span>
                </div>
            </article>
        @endforeach
    </div>

</section>
