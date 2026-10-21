@props(['title', 'icon' => null, 'items' => [], 'descriptions' => []])
<section class="sections">
    <h2 class="my-black">
        @if($icon)
            <img class="my-icons" src="{{ asset($icon) }}" alt="">
        @endif
        {{ $title }}
    </h2>
    <ul>
        @foreach($items as $item)
            <li class="my-dark">{{ $item }}</li>
        @endforeach
    </ul>
    <p>
    @foreach($descriptions as $description)
        {{ $description }}
    @endforeach
    </p>
    {{ $slot }} {{-- for custom content like certification images --}}
</section>
