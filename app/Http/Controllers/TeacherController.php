<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\SchoolClass;
use App\Models\Subject;
use App\Models\Section;
use App\Models\Enrollment;
use App\Models\Teacher;
use App\Models\Permission;
use App\Models\ClassRoom;
use App\Models\Timetable;
use App\Models\Exam;
use App\Models\AcademicYear;
use App\Models\Mark;
use Carbon\Carbon;

class TeacherController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function teachers()
    {
        $teachers = Teacher::all();
        return view('backend.teacher.teacher.index', compact('teachers'));
    }

    public function assignments()
    {
        return view('backend.teacher.assignment.index');
    }

    public function tutorials()
    {
        return view('backend.teacher.tutorials.index');
    }

    public function subjects()
    {
        $subjects = Subject::all();
        return view('backend.teacher.subject.index', compact('subjects'));
    }

    public function classes()
    {
        $classes = SchoolClass::all();
        return view('backend.teacher.class.index', compact('classes'));
    }

    public function classrooms()
    {
        $classrooms = ClassRoom::all();
        return view('backend.teacher.classroom.index', compact('classrooms'));
    }

    public function exams()
    {
        $activeAcademicYearId = AcademicYear::where('status', 1)->value('id');
        $exams = Exam::where('session_id', $activeAcademicYearId)->get();
        return view('backend.teacher.exam.index', compact('exams'));
    }

    public function profile()
    {
        return view('backend.teacher.profile.index');
    }

    public function students()
    {
        $classes = SchoolClass::all();
        $sections = Section::all();
        $class_id = '';
        $students = Enrollment::all();
        return view('backend.teacher.student.index', compact('classes', 'sections', 'class_id', 'students'));
    }

    public function updateteacher(Request $request)
    {
        $user = Auth::user();

        // Validation rules
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:12|min:9|unique:users,phone,' . $user->id,
            'address' => 'nullable|string|max:255',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];

        // Custom validation messages
        $messages = [
            'email.unique' => 'The email address has already been taken.',
            'phone.unique' => 'The phone number has already been taken.',
            'phone.max' => 'The phone number must not be greater than :max digits.',
            'phone.min' => 'The phone number must be at least :min digits.',
        ];

        // Validate the request
        $validator = Validator::make($request->all(), $rules, $messages);

        // If validation fails, redirect back with errors
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');

        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('profiles', $imageName, 'public');
            $user->profile_image = $imageName;
        }
        // Handle profile image update if needed

        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

    public function updateteacherPassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);

        $user = Auth::user();

        if (Hash::check($request->current_password, $user->password)) {
            $user->password = Hash::make($request->password);
            $user->save();

            return redirect()->back()->with('success', 'Password updated successfully.');
        }

        return redirect()->back()->withErrors(['current_password' => 'The current password is incorrect.']);
    }

    public function fetchSections(Request $request, $class_id)
    {
        // Fetch sections based on the provided class ID
        $sections = Section::where('class_id', $class_id)->get();

        // Redirect to another route with the sections and the selected class ID
        return response()->json($sections);
    }


    public function filterStudents(Request $request)
    {
        $classId = $request->input('class_id');
        $sectionId = $request->input('section_id');

        // Check if class ID or section ID is invalid
        if (!$classId || !$sectionId) {
            return view('backend.admin.empty');
        }

        // Get the ID of the active academic year
        $activeAcademicYearId = AcademicYear::where('status', 1)->value('id');

        // Check if the teacher has permission to view students for this class and section
        $teacherId = auth()->user()->id;
        $permission = Permission::where('user_id', $teacherId)
            ->where('class_id', $classId)
            ->where('section_id', $sectionId)
            ->where('marks', 1)
            ->exists();

        // If the teacher does not have permission, show access denied message
        if (!$permission) {
            return view('backend.teacher.access_denied');
        }

        // Retrieve students based on class, section, and active academic year
        $students = Enrollment::where('class_id', $classId)
            ->where('section_id', $sectionId)
            ->where('session_id', $activeAcademicYearId)
            ->get();

        return view('backend.teacher.student.list', compact('students'));
    }

    public function classRoutine(Request $request)
    {
        $class = $request->input('class_id');
        $section = $request->input('section_id');

        // Check if class ID or section ID is invalid
        if (!$class || !$section) {
            return view('backend.admin.empty');
        }

        // Get the ID of the active academic year
        $activeAcademicYearId = AcademicYear::where('status', 1)->value('id');

        // Retrieve students based on class, section, and active academic year
        $teacherId = Teacher::where('user_id', auth()->user()->id)->value('id');
        $timetables = Timetable::where('class_id', $class)
            ->where('section_id', $section)
            ->where('teacher_id', $teacherId)
            ->where('session_id', $activeAcademicYearId)
            ->get();

        return view('backend.teacher.routine.list', compact('timetables'));
    }

    public function routine()
    {
        $classes = SchoolClass::all();
        $sections = Section::all();
        $class_id = '';
        $subjects = Subject::all();
        $teachers = Teacher::all();
        $classrooms = ClassRoom::all();
        return view('backend.teacher.routine.index', compact('classes', 'sections', 'class_id', 'subjects', 'teachers', 'classrooms'));
    }

    public function marks()
    {
        $activeAcademicYearId = AcademicYear::where('status', 1)->value('id');
        $exams = Exam::where('session_id', $activeAcademicYearId)->get();
        $classes = SchoolClass::all();
        $sections = Section::all();
        $class_id = '';
        $subjects = Subject::all();
        $teachers = Teacher::all();
        $classrooms = ClassRoom::all();
        return view('backend.teacher.marks.index', compact('exams', 'classes', 'sections', 'class_id', 'subjects', 'teachers', 'classrooms'));
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

        // Check if the teacher has permission to submit marks for this class and section
        $permission = Permission::where('user_id', $teacherId)
            ->where('class_id', $class)
            ->where('section_id', $section)
            ->where('subject_id', $subject)
            ->where('marks', 1)
            ->exists();


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

        return view('backend.teacher.marks.list', compact('studentsWithMarks', 'permission', 'className', 'sectionName', 'subjectName', 'examEndingDate', 'examDatePassed', 'exam', 'subject'));
    }

    public function submitMarks(Request $request)
    {
        // Get the marks data from the request
        $marksData = $request->input('mark_obtained');
        $examId = $request->input('exam_id');
        $subjectId = $request->input('subject_id');

        // Update or create marks for each student
        foreach ($marksData as $studentId => $mark) {
            $roundedMark = round($mark);
            // Check if the record already exists for the exam, student, and subject
            $existingMark = Mark::where('student_id', $studentId)
                ->where('exam_id', $examId)
                ->where('subject_id', $subjectId)
                ->exists();

            if ($existingMark) {
                // Update the existing record
                Mark::where('student_id', $studentId)
                    ->where('exam_id', $examId)
                    ->where('subject_id', $subjectId)
                    ->update(['mark_obtained' => $roundedMark]);
            } else {
                // Create a new record
                Mark::create([
                    'student_id' => $studentId,
                    'exam_id' => $examId,
                    'subject_id' => $subjectId,
                    'mark_obtained' => $roundedMark
                ]);
            }
        }

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Marks submitted successfully');
    }
}
