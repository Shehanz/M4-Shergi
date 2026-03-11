<?php

namespace App\Http\Controllers;

class pageController extends Controller

{
    public function home()
    {
        return view('index');
    }

    public function about()
    {
        return view('about');
    }

    public function resume()
    {
        return view('resume');
    }

    public function services()
    {
        return view('services');
    }

    public function portfolio()
    {
        return view('portfolio');
    }

    public function contact()
    {
        return view('contact');
    }

    public function terms()
    {
        return view('terms');
    }

    public function privacy()
    {
        return view('privacy');
    }
}
