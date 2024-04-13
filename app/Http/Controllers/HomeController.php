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
use App\Models\Enrollment;
use App\Models\Teacher;
use App\Models\Permission;
use App\Models\Gallery;
use App\Models\ClassRoom;
use App\Models\Timetable;
use App\Models\Exam;
use App\Models\AcademicYear;


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
    $activeAcademicYearId = AcademicYear::where('status', 1)->value('id');

    if ($user->role == 'admin') {
        $studentCount = Enrollment::where('session_id', $activeAcademicYearId)->count();
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
          $activeAcademicYearId = AcademicYear::where('status', 1)->value('id');
        $exams = Exam::where('session_id', $activeAcademicYearId)->get();
        $classes = SchoolClass::all();
        $sections = Section::all();
        $class_id = '';
        return view('backend.admin.submitted_marks.index', compact('exams', 'classes', 'sections', 'class_id'));
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
        $galleries = Gallery::all();
        return view('backend.admin.website_settings.gallery', compact('galleries'));
    }

    public function eventSettings()
    {

        return view('backend.admin.website_settings.event');
    }

    public function galleryImageSettings($id)
    {
        $gallery = Gallery::find($id);
        return view('backend.admin.website_settings.gallery_image', compact('gallery'));
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
    $teachers = Teacher::all();
    $socialLinks = [];

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
        $teacherPermissions[$teacher->user_id] = Permission::where('user_id', $teacher->user_id)->get();
    }

    return view('backend.admin.teacher.index', compact('teachers', 'socialLinks', 'teacherPermissions'));
}


    public function students()
    {
        $classes = SchoolClass::all();
        $sections = Section::all();
        $class_id = '';
        $students = Enrollment::all();
        return view('backend.admin.student.index', compact('classes', 'sections', 'class_id', 'students'));
    }

    public function labSettings()
    {
        $sliderSettings = GeneralSetting::first();        
         $sliderImages = $sliderSettings->physics_lab;
            $sliderImages = json_decode($sliderImages, true);
        return view('backend.admin.website_settings.lab_settings', [
        'sliderImages' => $sliderImages,
    ]);
    }

    public function bioLab()
    {
        $sliderSettings = GeneralSetting::first();        
         $sliderImages = $sliderSettings->biology_lab;
            $sliderImages = json_decode($sliderImages, true);
        return view('backend.admin.website_settings.biology_lab', [
        'sliderImages' => $sliderImages,
    ]);
    }

    public function chemLab()
    {
        $sliderSettings = GeneralSetting::first();        
         $sliderImages = $sliderSettings->chemistry_lab;
            $sliderImages = json_decode($sliderImages, true);
        return view('backend.admin.website_settings.chemistry_lab', [
        'sliderImages' => $sliderImages,
    ]);
    }

    public function comLab()
    {
        $sliderSettings = GeneralSetting::first();        
         $sliderImages = $sliderSettings->computer_lab;
            $sliderImages = json_decode($sliderImages, true);
        return view('backend.admin.website_settings.computer_lab', [
        'sliderImages' => $sliderImages,
    ]);
    }

    public function studentAdmission()
    {
        return view('backend.admin.student.index');
    }

    public function teacherPermission()
    {
        $classes = SchoolClass::all();
        $sections = Section::all();
        $subjects = Subject::all();
        $class_id = '';
        return view('backend.admin.permission.index', compact('classes', 'sections', 'class_id', 'subjects'));
    }

    public function parents()
    {
        return view('backend.admin.parent.index');
    }

    public function admins()
    {
        $admins = User::where('role', 'admin')->get();
        return view('backend.admin.admins.index', compact('admins'));
    }
    
    public function classes()
    {
        $classes = SchoolClass::all();
        $sections = Section::all();
        return view('backend.admin.class.index', compact('classes', 'sections'));
    }

    
    public function routine()
    {
         $classes = SchoolClass::all();
        $sections = Section::all();
        $class_id = '';
        $subjects = Subject::all();
        $teachers = Teacher::all();
        $classrooms = ClassRoom::all();
        return view('backend.admin.routine.index', compact('classes', 'sections', 'class_id', 'subjects', 'teachers', 'classrooms'));
    }
    
    public function classRoom()
    {
        $classrooms = ClassRoom::all();
        return view('backend.admin.class_room.index', compact('classrooms'));
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
        $sessions = AcademicYear::all();
        $classes = SchoolClass::all();
        $class_id_from = [];
        return view('backend.admin.promotion.index', compact('sessions', 'classes', 'class_id_from'));
    }


    public function academicYear()
    {
        $academicyears = AcademicYear::all();
        return view('backend.admin.academic_year.index', compact('academicyears'));
    }

    public function adminExam()
    {
        $activeAcademicYearId = AcademicYear::where('status', 1)->value('id');
        $exams = Exam::where('session_id', $activeAcademicYearId)->get();
        return view('backend.admin.exam.index', compact('exams'));
    }

    public function adminMarks()
    {
        $activeAcademicYearId = AcademicYear::where('status', 1)->value('id');
        $exams = Exam::where('session_id', $activeAcademicYearId)->get();
        $classes = SchoolClass::all();
        $sections = Section::all();
        $subjects = Subject::all();
        $class_id = '';
        return view('backend.admin.marks.index', compact('exams', 'classes', 'sections', 'subjects', 'class_id'));
    }

    public function editStudent($id) {
    $user = User::findOrFail($id);
    return view('backend.admin.student.update', compact('user'));
}


}
