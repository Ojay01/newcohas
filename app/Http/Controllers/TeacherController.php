<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\Setting;
use App\Models\SchoolClass;
use App\Models\Subject;
use App\Models\Section;
use App\Models\Department;
use App\Models\Enrollment;
use App\Models\User;
use App\Models\Teacher;
use App\Models\Permission;
use App\Models\Gallery;
use App\Models\GalleryImage;
use App\Models\ClassRoom;
use App\Models\Timetable;
use App\Models\Exam;
use App\Models\AcademicYear;

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


}