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
use App\Models\Mark;
use Carbon\Carbon;


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
        $teacherCount = User::where('role', 'teacher')->count();
         $teacherId = auth()->user()->id;

    // Retrieve section IDs where the teacher is permitted to see
   // Retrieve unique section IDs without duplicates
$sectionIds = Permission::where('user_id', $teacherId)
    ->where('marks', 1)
    ->pluck('section_id')
    ->unique()
    ->values();

    // Initialize a variable to store the total enrollment count
    $totalEnrollmentCount = 0;

    // Calculate total enrollment count across all sections
    foreach ($sectionIds as $sectionId) {
        $enrollmentCount = Enrollment::where('section_id', $sectionId)
            ->count();

        // Add the enrollment count to the total count
        $totalEnrollmentCount += $enrollmentCount;
    }
        return view('backend.teacher.index', compact('teacherCount', 'totalEnrollmentCount'));

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

         public function allSubmittedMarks(Request $request)
{
    // Get the selected exam ID from the request
    $examId = $request->input('exam_id');
        $classId = $request->input('class_id');
        $sectionId = $request->input('section_id');

    // Retrieve the submitted subjects and their corresponding class and section IDs
    // Retrieve the submitted subjects and their corresponding class and section IDs
$submittedSubjects = Mark::select('subjects.name', 'enrollments.class_id', 'enrollments.section_id')
    ->join('enrollments', 'marks.student_id', '=', 'enrollments.id')
    ->join('subjects', 'marks.subject_id', '=', 'subjects.id') // Join subjects table to get the subject name
    ->where('marks.exam_id', $examId)
    ->where('enrollments.class_id', $classId)
    ->where('enrollments.section_id', $sectionId)
    ->distinct()
    ->get();



    // Pass the submitted subjects to the view for display
    return view('backend.admin.submitted_marks.list', compact('submittedSubjects', 'examId', 'classId', 'sectionId'));
}

public function manageMarks(Request $request)
    {
        $class = $request->input('class_id');
        $section = $request->input('section_id');
        $exam = $request->input('exam_id');
        $subject = $request->input('subject_id');

        // Check if class ID, section ID, exam ID, or subject ID is invalid
        if (!$class || !$section || !$exam || !$subject) {
            return view('backend.admin.empty');
        }

        // Retrieve the class name, section name, and subject name
        $className = SchoolClass::find($class)->name;
        $sectionName = Section::find($section)->name;
        $subjectName = Subject::find($subject)->name;
        $examEndingDate = Exam::find($exam)->ending_date;
        $examDatePassed = Carbon::now()->gt(Carbon::parse($examEndingDate));
        // Get the ID of the active academic year
        $activeAcademicYearId = AcademicYear::where('status', 1)->value('id');

        // Retrieve the authenticated user's ID
        $teacherId = auth()->user()->id;


        // Retrieve students (enrollments) of the specified class, section, and academic year
        $students = Enrollment::where('class_id', $class)
            ->where('section_id', $section)
            ->where('session_id', $activeAcademicYearId)
            ->get();

        // Prepare a collection of students with their marks obtained (or 0 if no mark exists)
        $studentsWithMarks = [];
        foreach ($students as $student) {
            $studentId = $student->id;

            // Retrieve marks for the specified exam and student
            $marks = Mark::where('exam_id', $exam)
                ->where('student_id', $studentId)
                ->where('subject_id', $subject)
                ->get();

            // Calculate total marks obtained for the student
            $totalMarks = $marks->sum('mark_obtained');

            // Append the student's information and marks to the collection
            $studentsWithMarks[] = [
                'id' => $studentId,
                'name' => $student->user->name,
                'total_marks' => $totalMarks,
            ];
        }

        return view('backend.admin.marks.list', compact('studentsWithMarks', 'className', 'sectionName', 'subjectName', 'examEndingDate', 'examDatePassed', 'exam', 'subject'));
    }


}
