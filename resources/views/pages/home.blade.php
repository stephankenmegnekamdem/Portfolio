@extends('components.layouts.app')

@section('title', 'Home — ' . config('portfolio.name'))

@section('content')
<section class="screen">
        <div class="screen-body">

        <x-menu/>

    <div class="detailed-info">
        @foreach($sections as $key => $section)

    @if($key === 'personal')
        <section class="sections">
            <h2 class="my-black">
                @if(!empty($section['icon']))
                    <img class="my-icons" src="{{ asset($section['icon']) }}" alt="">
                @endif
                {{ $section['title'] }}
            </h2>

            <ul class="my-black">
                @foreach($section['items'] as $item)
                    <li class="my-dark"><b>Title:</b> {{ $item }}</li>
                @endforeach
                <li><b>Nationality:</b><a href="https://fr.wikipedia.org/wiki/Cameroun"> Cameroon 🇨🇲</a></li>
            </ul>

            <p class="my-grey">{{ implode(' ', (array) $section['descriptions']) }}</p>
        </section>

    @elseif($key === 'education')
        <section class="sections">
            <h2 class="my-black">
                Education
            </h2>

            @foreach($section as $education)
                <div class="education-item">
                    <h2 class="my-black">
                        <img class="my-icons" src="{{ asset('images/icons/education.svg') }}" alt="">
                        {{ $education['title'] }}
                    </h2>

                    <ul>
                        @foreach($education['items'] as $item)
                            <li class="my-dark">{{ $item }}</li>
                        @endforeach
                    </ul>

                    <p class="my-grey">{{ implode(' ', (array) $education['descriptions']) }}</p>
                </div>
            @endforeach
        </section>

    @elseif($key === 'projects')
        <section class="sections">
            <h2 class="my-black">
                Project
            </h2>

            @foreach($section as $projects)
                <div class="education-item">
                    <h2 class="my-black">
                        <img class="my-icons" src="{{ asset('images/icons/education.svg') }}" alt="">
                        {{ $projects['title'] }}
                    </h2>

                    <ul>
                        @foreach($projects['items'] as $item)
                            <li class="my-dark">{{ $item }}</li>
                        @endforeach
                    </ul>

                    <p class="my-grey">{{ implode(' ', (array) $projects['descriptions']) }}</p>
                </div>
            @endforeach
        </section>

    @else
        <x-info-section
            :title="$section['title']"
            :icon="$section['icon']"
            :items="$section['items']"
            :descriptions="$section['descriptions']"
        />
    @endif

@endforeach



        <x-info-section title="Certifications">
            <img class="my-certifications" src="{{ asset('images/certs/cert1.png') }}" alt="Certification">
            <img class="my-certifications" src="{{ asset('images/certs/cert1.png') }}" alt="Certification">
            <img class="my-certifications" src="{{ asset('images/certs/cert1.png') }}" alt="Certification">
            <img class="my-certifications" src="{{ asset('images/certs/cert1.png') }}" alt="Certification">
            <img class="my-certifications" src="{{ asset('images/certs/cert1.png') }}" alt="Certification">
            <img class="my-certifications" src="{{ asset('images/certs/cert1.png') }}" alt="Certification">
        </x-info-section>
    </div>

        </div>
</section>
@endsection
