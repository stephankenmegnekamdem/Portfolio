@extends("components.layouts.app")
@section('title', 'Projects — ' . config('portfolio.name'))
@section('content')

    <aside>
             @foreach($sections['education'] as $education)
            <a href="#!">{{ $education['title'] }}</a><br>
            @endforeach
    </aside>
    <div class="detailed-info">
             @foreach($sections['education'] as $education)
                <x-info-section
                    :title="$education['title']"
                    :icon="$education['icon']"
                    :items="$education['items']"
                    :description="$education['description']" />
            @endforeach
    </div>
@endsection
