<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Logo;
use App\Models\GeneralSetting;
use App\Models\SchoolSetting;
use App\Models\SchoolClass;
use App\Models\Section;
use App\Models\Department;
use App\Models\Subject;
use App\Models\User;


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
        $user = auth()->user(); // Retrieve the currently logged-in user

    if ($user->role == 'admin') {
        $studentCount = User::where('role', 'student')->count();
        $teacherCount = User::where('role', 'teacher')->count();
        $parentCount = User::where('role', 'parent')->count();

            return view('backend.admin.index', compact('studentCount', 'teacherCount', 'parentCount'));
        } else {
        return view('backend.teacher.index');
        }
    }

    public function profile()
    {
        return view('backend.admin.profile.index');
    }

    public function systemSetting()
    {
        $settings = Setting::first();
        $logos = Logo::first();
        return view('backend.admin.settings.system_setting', compact('settings', 'logos'));
    }

    public function onlineAdmission()
    {
        return view('backend.admin.online_admission.index');
    }

    public function submittedMarks()
    {
        return view('backend.admin.submitted_marks.index');
    }

    public function websiteSettings()
    {
        $settings = GeneralSetting::first();
    
        return view('backend.admin.website_settings.general_settings', [
        'settings' => $settings,
    ]);
    }

    public function aboutUsSettings()
    {
                $settings = GeneralSetting::first();
        return view('backend.admin.website_settings.about_us', compact('settings'));
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

    public function others()
    {
        $settings = GeneralSetting::first();
        return view('backend.admin.website_settings.others', compact('settings'));
    }

    public function noticeboardSettings()
    {
        return view('backend.admin.noticeboard.index');
    }

    public function termsSettings()
    {
        $settings = GeneralSetting::first();
        return view('backend.admin.website_settings.terms_settings', compact('settings'));
    }

    public function privacySettings()
    {
        $settings = GeneralSetting::first();
        return view('backend.admin.website_settings.privacy_settings', compact('settings'));
    }

    public function homepageSettings()
    {
        $sliderSettings = GeneralSetting::first();        
         $sliderImages = $sliderSettings->slider_images;
            $sliderImages = json_decode($sliderImages, true);
        return view('backend.admin.website_settings.homepage_settings', [
        'sliderImages' => $sliderImages,
    ]);
    }


    public function schoolSettings()
    {
         $schoolSettings = SchoolSetting::first();
        return view('backend.admin.website_settings.school_settings', compact('schoolSettings'));
    }

    public function teachers()
    {
        return view('backend.admin.teacher.index');
    }

    public function students()
    {
        return view('backend.admin.student.index');
    }

    public function labSettings()
    {
        return view('backend.admin.website_settings.lab_settings');
    }

    public function studentAdmission()
    {
        return view('backend.admin.student.index');
    }

    public function teacherPermission()
    {
        return view('backend.admin.permission.index');
    }

    public function parents()
    {
        return view('backend.admin.parent.index');
    }

    public function admins()
    {
        return view('backend.admin.admins.index');
    }
    
    public function classes()
    {
        $classes = SchoolClass::all();
        $sections = Section::all();
        return view('backend.admin.class.index', compact('classes', 'sections'));
    }

    
    public function routine()
    {
        return view('backend.admin.routine.index');
    }
    
    public function classRoom()
    {
        return view('backend.admin.class_room.index');
    }

    public function subjects()
    {
        $subjects = Subject::all();
        return view('backend.admin.subject.index', compact('subjects'));
    }

    public function syllabus()
    {
        return view('backend.admin.syllabus.index');
    }

    public function department()
    {
        $departments = Department::all();
        return view('backend.admin.department.index', compact('departments'));
    }

    public function singleAdmission()
    {
        return view('backend.admin.student.create');
    }

    public function bulkAdmission()
    {
        return view('backend.admin.student.create');
    }

    public function studentAssignment()
    {
        return view('backend.admin.assignment.index');
    }

    public function studentTutorial()
    {
        return view('backend.admin.tutorial.index');
    }

    public function eventCalender()
    {
        return view('backend.admin.event.index');
    }

    public function attendance()
    {
        return view('backend.admin.attendance.index');
    }

    public function promotion()
    {
        return view('backend.admin.promotion.index');
    }

    public function adminExam()
    {
        return view('backend.admin.exam.index');
    }

    public function adminMarks()
    {
        return view('backend.admin.marks.index');
    }

}
