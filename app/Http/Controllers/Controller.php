<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\GeneralSetting;
use App\Models\SchoolSetting;
use App\Models\Setting;
use App\Models\Teacher;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

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
        $teachers = Teacher::where('show_on_website', 1)->get();
        
        foreach ($teachers as $teacher) {
        $decodedLinks = json_decode($teacher->social_links, true);
        $twitter = $decodedLinks['twitter'] ?? '';
        $facebook = $decodedLinks['facebook'] ?? '';
        $linkedin = $decodedLinks['linkedin'] ?? '';

        // Store the social links in an array for each teacher
        $socialLinks[$teacher->id] = [
            'twitter' => $twitter,
            'facebook' => $facebook,
            'linkedin' => $linkedin,
        ];
    }
        return view('frontend.teachers', compact('schoolSettings', 'settings', 'sliderSettings', 'teachers', 'socialLinks'));
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

    public function contactForm(Request $request)
{
    // Validate the form data
   $request->validate([
        'first_name' => 'required|string',
        'last_name' => 'required|string',
        'email' => 'required|email',
        'phone' => 'required|numeric',
        'address' => 'required|string',
        'comment' => 'required|string',
    ]);

    $data = [
    'name' => $request->input('first_name') . ' ' . $request->input('last_name'),
    'email' => $request->input('email'),
    'phone' => $request->input('phone'),
    'location' => $request->input('address'),
    'message' => $request->input('comment'),
];

\Mail::to('okellykings220@gmail.com')->send(new ContactFormMail($data));
    // Redirect back with a success message
    return redirect()->back()->with('success', 'Your message has been submitted successfully.');
}

}
