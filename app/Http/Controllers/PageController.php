<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function home()
    {
        return view('pages.home', [
            'projects' => config('portfolio.projects'),
            'sections' => config('portfolio.sections'),
        ]);
    }

    public function projects()
    {
        return view('pages.projects', [
            'projects' => config('portfolio.projects'),
        ]);
    }

    public function cv()
    {
        return view('pages.cv', [
            'projects' => config('portfolio.projects'),
            'sections' => config('portfolio.sections'),
        ]);
    }
}
