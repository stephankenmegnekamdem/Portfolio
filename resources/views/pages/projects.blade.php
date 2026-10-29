@extends('components.layouts.app')

@section('sidenav')
    @php
        $projectSideLinks = array_merge(
            [['href' => '#header', 'label' => 'Top']],
            collect($projects)->map(fn ($p) => [
                'href'  => '#' . \Illuminate\Support\Str::slug($p['title']),
                'label' => $p['title'],
            ])->all()
        );
    @endphp

    <x-layout.side-nav fixed :sections="$projectSideLinks" />
@endsection

@section('term', 'cd projects')

@section('title', 'Projects — ' . config('portfolio.name'))

{{-- Project tile grid and scroll arrow, rendered inside the header slot --}}
@section('hero')
    <br>
    <br>
    <x-sections.project-grid :projects="$projects" />
    <x-ui.scroll-cue />
@endsection

@section('content')
    @foreach($projects as $project)
        <x-sections.project-screen :project="$project" />
    @endforeach
@endsection
