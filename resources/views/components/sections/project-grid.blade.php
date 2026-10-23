@props(['projects' => []])

@php
    use Illuminate\Support\Str;
@endphp

<section class="project-grid-section">
    <div class="project-grid">
        @foreach($projects as $project)
            <a href="#{{ Str::slug($project['title']) }}" class="project-tile">
                <img src="{{ asset($project['image']) }}"
                     alt="{{ $project['title'] }}"
                     class="project-tile-image">
                <span class="project-tile-title">{{ $project['title'] }}</span>
            </a>
        @endforeach
    </div>
</section>
