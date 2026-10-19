@props(['project'])

<div class="project">
    <a href="{{ $project['url'] }}" target="_blank" rel="noopener">
        <img src="{{ asset($project['image']) }}" alt="{{ $project['title'] }}">
    </a>
    <div class="dropdown-content">
        <p class="my-black">{{ $project['title'] }}</p>
        <p class="my-dark">{{ $project['description'] }}</p>
    </div>
</div>
