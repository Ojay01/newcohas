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
        $user = auth()->user(); // Retrieve the currently logged-in user

    if ($user->role == 'admin') {
            return view('backend.admin.index');
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
        return view('backend.admin.settings.system_setting');
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

    public function others()
    {
        return view('backend.admin.website_settings.others');
    }

    public function noticeboardSettings()
    {
        return view('backend.admin.noticeboard.index');
    }

    public function termsSettings()
    {
        return view('backend.admin.website_settings.terms_settings');
    }

    public function privacySettings()
    {
        return view('backend.admin.website_settings.privacy_settings');
    }

    public function homepageSettings()
    {
        return view('backend.admin.website_settings.homepage_settings');
    }

    public function schoolSettings()
    {
        return view('backend.admin.website_settings.school_settings');
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
        return view('backend.admin.class.index');
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
        return view('backend.admin.subject.index');
    }

    public function syllabus()
    {
        return view('backend.admin.syllabus.index');
    }

    public function department()
    {
        return view('backend.admin.department.index');
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
