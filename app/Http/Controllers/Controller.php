<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\GeneralSetting;
use App\Models\SchoolSetting;
use App\Models\Setting;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
         $sliderSettings = GeneralSetting::first(); 
         $schoolSettings = SchoolSetting::first(); 
         $settings = Setting::first(); 
         $sliderImages = $sliderSettings->slider_images;
         $chemLab = $sliderSettings->chemistry_lab;
         $phyLab = $sliderSettings->physics_lab;
         $compLab = $sliderSettings->computer_lab;
         $bioLab = $sliderSettings->biology_lab;
        $sliderImages = json_decode($sliderImages, true);
        $chemLab = json_decode($chemLab, true);
        $phyLab = json_decode($phyLab, true);
        $compLab = json_decode($compLab, true);
        $bioLab = json_decode($bioLab, true);
        return view('frontend.index', compact('sliderImages', 'sliderSettings', 'schoolSettings', 'settings', 'compLab', 'bioLab', 'phyLab', 'chemLab'));
    }

    public function about()
    {
         $schoolSettings = SchoolSetting::first();
         $sliderSettings = GeneralSetting::first(); 
         $settings = Setting::first(); 
        return view('frontend.about', compact('schoolSettings', 'settings', 'sliderSettings'));
    }

    public function noticeboard()
    {
         $schoolSettings = SchoolSetting::first();
         $sliderSettings = GeneralSetting::first(); 
         $settings = Setting::first();    
        return view('frontend.noticeboard', compact('schoolSettings', 'settings', 'sliderSettings'));
    }

    public function gallery()
    {
         $schoolSettings = SchoolSetting::first();
         $sliderSettings = GeneralSetting::first(); 
         $settings = Setting::first(); 
        return view('frontend.gallery', compact('schoolSettings', 'settings', 'sliderSettings'));
    }

    public function events()
    {
         $schoolSettings = SchoolSetting::first();
         $sliderSettings = GeneralSetting::first(); 
         $settings = Setting::first();   
        return view('frontend.events', compact('schoolSettings', 'settings', 'sliderSettings'));
    }

    public function teachers()
    {
         $schoolSettings = SchoolSetting::first();
         $sliderSettings = GeneralSetting::first(); 
         $settings = Setting::first(); 
        return view('frontend.teachers', compact('schoolSettings', 'settings', 'sliderSettings'));
    }

    public function contact()
    {
         $schoolSettings = SchoolSetting::first(); 
         $sliderSettings = GeneralSetting::first(); 
         $settings = Setting::first();  
        return view('frontend.contact', compact('schoolSettings', 'settings', 'sliderSettings'));
    }

    public function privacy()
    {
         $schoolSettings = SchoolSetting::first();
         $sliderSettings = GeneralSetting::first(); 
         $settings = Setting::first(); 
        return view('frontend.privacy', compact('schoolSettings', 'settings', 'sliderSettings'));
    }

    public function terms()
    {
         $schoolSettings = SchoolSetting::first();
         $sliderSettings = GeneralSetting::first(); 
         $settings = Setting::first();    
        return view('frontend.terms', compact('schoolSettings', 'settings', 'sliderSettings'));
    }

    public function admission()
    {
         $schoolSettings = SchoolSetting::first();
         $sliderSettings = GeneralSetting::first(); 
         $settings = Setting::first();  
        return view('frontend.admission', compact('schoolSettings', 'settings', 'sliderSettings'));
    }

    public function discipline()
    {
         $schoolSettings = SchoolSetting::first(); 
         $sliderSettings = GeneralSetting::first(); 
         $settings = Setting::first();    
        return view('frontend.discipline', compact('schoolSettings', 'settings', 'sliderSettings'));
    }

    public function assignments()
    {
         $schoolSettings = SchoolSetting::first();
         $sliderSettings = GeneralSetting::first(); 
         $settings = Setting::first();    
        return view('frontend.assignments', compact('schoolSettings', 'settings', 'sliderSettings'));
    }

    public function tutorials()
    {
         $schoolSettings = SchoolSetting::first();
         $sliderSettings = GeneralSetting::first(); 
         $settings = Setting::first();    
        return view('frontend.tutorials', compact('schoolSettings', 'settings', 'sliderSettings'));
    }

}
