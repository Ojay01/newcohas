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

class AdminController extends Controller
{
    public function update(Request $request)
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

    public function updatePassword(Request $request)
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

    public function addClass(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|string',
    ]);

    $class = new SchoolClass();
        $class->name = $validatedData['name'];
        // $class->description = $validatedData['description'];
        $class->save();

    return redirect()->back()->with('success', 'Class added successfully.');
}


    public function addSection(Request $request, $class_id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $section = new Section();
        $section->name = $validatedData['name'];
        $section->class_id = $class_id;
        // Add other fields as needed
        $section->save();

        return redirect()->back()->with('success', 'Section added successfully.');
    }


    public function addSubject(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $subject = new Subject();
        $subject->name = $validatedData['name'];
        // Add other fields as needed
        $subject->save();

        return redirect()->back()->with('success', 'Subject added successfully.');
    }

    public function updateClass(Request $request, $id)
    {
        // Validate the request data if needed
        $request->validate([
            'name' => 'required|string|max:25',
            // Add more validation rules if needed
        ]);

        // Find the class by ID
        $class = SchoolClass::findOrFail($id);

        // Update class name
        $class->name = $request->input('name');
        // Update other class properties if needed

        // Save the updated class
        $class->save();

        // Redirect back with a success message or any other response
        return redirect()->back()->with('success', 'Class updated successfully');
    }

    public function addDepartment(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $department = new Department();
        $department->name = $validatedData['name'];
        // Add other fields as needed
        $department->save();

        return redirect()->back()->with('success', 'Department added successfully.');
    }

    public function updateDepartment(Request $request, $department_id)
    {
        $department = Department::findOrFail($department_id);
        $department->name = $request->input('name');
        $department->save();

        return redirect()->back()->with('success', 'Department updated successfully.');
    }

    public function updateSubject(Request $request, $subject_id)
    {
        $subject = Subject::findOrFail($subject_id);
        $subject->name = $request->input('name');
        $subject->save();

        return redirect()->back()->with('success', 'Subject updated successfully.');
    }

    public function deleteSection(Section $section)
    {
        $section->delete();

        return redirect()->back()->with('success', 'Section deleted successfully.');
    }

    public function deleteClass(SchoolClass $class)
    {
        $class->delete();

        return response()->json(['message' => 'Class deleted successfully']);
    }

    public function deleteDepartment(Department $department)
    {
        $department->delete();

        return response()->json(['message' => 'department deleted successfully']);
    }

    public function deleteSubject(Subject $subject)
    {
        $subject->delete();

        return response()->json(['message' => 'subject deleted successfully']);
    }


    public function fetchSections(Request $request, $class_id)
{
    // Fetch sections based on the provided class ID
    $sections = Section::where('class_id', $class_id)->get();
    
    // Redirect to another route with the sections and the selected class ID
    return response()->json($sections);
}

// public function filterStudents(Request $request)
// {
//     $classId = $request->input('class_id');
//     $sectionId = $request->input('section_id');

//     // Retrieve enrollments based on class and section IDs
//     $enrollments = Enrollment::where('class_id', $classId)
//                              ->where('section_id', $sectionId)
//                              ->get();

//     // Initialize an array to store student details
//     $students = [];

//     // Iterate over each enrollment record
//     foreach ($enrollments as $enrollment) {
//         // Fetch the student details from the users table based on student_id
//         $student = User::find($enrollment->student_id);

//         // If the student exists, add their details to the array
//         if ($student) {
//             $studentDetails = [
//                 'name' => $student->name, // Retrieve the name from the users table
//                 'status' => $student->status, // Assuming status exists in the users table
//                 // Add other details as needed
//             ];

//             // Add the student details to the array
//             $students[] = $studentDetails;
//         }
//     }

//     // Return the filtered students as JSON response
//     return response()->json($students);
// }

public function filterStudents(Request $request)
{
    $classId = $request->input('class_id');
    $sectionId = $request->input('section_id');

    // Check if class ID or section ID is invalid
    if (!$classId || !$sectionId) {
        return view('backend.admin.empty') ;
    }

    // Retrieve students based on class and section IDs
    $students = Enrollment::where('class_id', $classId)
                       ->where('section_id', $sectionId)
                       ->get();

    return view('backend.admin.student.list', compact('students'));
}



}
