<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('index');  // loads homepage view
    }

    public function about()
    {
        return view('about');  // loads about page view
    }

    public function contact()
    {
        return view('contact'); // loads contact page view
    }
}
