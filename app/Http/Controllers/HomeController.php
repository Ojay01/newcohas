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
}
