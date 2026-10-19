@extends("components.layouts.app")
@section('title', 'Projects — ' . config('portfolio.name'))
@section('content')

    <aside>
             @foreach($projects as $project)
            <a href="#!">{{ $project['title'] }}</a><br>
            @endforeach
    </aside>
    <div class="detailed-info">
             @foreach($projects as $project)
                <x-project-card :project="$project" />
            @endforeach
    </div>
@endsection
