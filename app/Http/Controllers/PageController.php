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

    public function about()
    {
        return view('pages.about', [
            'sections' => config('portfolio.sections'),
        ]);
    }

    public function education()
    {
        return view('pages.education', [
            'sections' => config('portfolio.sections'),
        ]);
    }

    public function work()
    {
        return view('pages.work', [
        ]);
    }

    public function projects()
    {
       return view('pages.projects', [
            'projects' => config('portfolio.projects'),
        ]);
    }

    public function certifications()
    {
        return view('pages.certifications', [
            'sections' => config('portfolio.sections'),
        ]);
    }
    public function cv()
    {
        return view('pages.cv', [
            'projects' => config('portfolio.projects'),
            'sections' => config('portfolio.sections'),
        ]);
    }
    public function contact()
    {
        return view('pages.contact');
    }
}
