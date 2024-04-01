<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function about()
    {
        return view('frontend.about');
    }

    public function noticeboard()
    {
        return view('frontend.noticeboard');
    }

    public function gallery()
    {
        return view('frontend.gallery');
    }

    public function events()
    {
        return view('frontend.events');
    }

    public function teachers()
    {
        return view('frontend.teachers');
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function privacy()
    {
        return view('frontend.privacy');
    }

    public function terms()
    {
        return view('frontend.terms');
    }

    public function admission()
    {
        return view('frontend.admission');
    }

    public function discipline()
    {
        return view('frontend.discipline');
    }

    public function assignments()
    {
        return view('frontend.assignments');
    }

    public function tutorials()
    {
        return view('frontend.tutorials');
    }

}
