<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('backend.admin.index');
    }

    public function profile()
    {
        return view('backend.admin.profile.index');
    }

    public function systemSetting()
    {
        return view('backend.admin.settings.system_setting');
    }

    public function onlineAdmission()
    {
        return view('backend.admin.online_admission.index');
    }

    public function websiteSettings()
    {
        return view('backend.admin.website_settings.general_settings');
    }

    public function aboutUsSettings()
    {
        return view('backend.admin.website_settings.about_us');
    }

    public function gallerySettings()
    {
        return view('backend.admin.website_settings.gallery');
    }

    public function eventSettings()
    {
        return view('backend.admin.website_settings.event');
    }

    public function galleryImageSettings()
    {
        return view('backend.admin.website_settings.gallery_image');
    }
}
