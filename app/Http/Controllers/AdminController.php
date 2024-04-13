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

    public function addClassRoom(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|string',
    ]);

    $classroom = new ClassRoom();
        $classroom->name = $validatedData['name'];
        // $class->description = $validatedData['description'];
        $classroom->save();

    return redirect()->back()->with('success', 'Classroom added successfully.');
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

    public function updateClassroom(Request $request, $id)
    {
        // Validate the request data if needed
        $request->validate([
            'name' => 'required|string|max:25',
            // Add more validation rules if needed
        ]);

        // Find the class by ID
        $classroom = ClassRoom::findOrFail($id);

        // Update class name
        $classroom->name = $request->input('name');
        // Update other class properties if needed

        // Save the updated class
        $classroom->save();

        // Redirect back with a success message or any other response
        return redirect()->back()->with('success', 'Classroom updated successfully');
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
        $enrolmentsCount = $section->enrolments()->count();

        if ($enrolmentsCount > 0) {
            // Enrolments exist, so class cannot be deleted
            return redirect()->back()->with('error', 'Cannot delete a section with students');
        }

        $section->delete();

        return redirect()->back()->with('success', 'Section deleted successfully.');
    }

    public function deleteClass(SchoolClass $class)
{
    // Check if any enrolments exist for this class
    $enrolmentsCount = $class->enrolments()->count();

    if ($enrolmentsCount > 0) {
        // Enrolments exist, so class cannot be deleted
        return redirect()->back()->with('error', 'Cannot delete class with students');
    }

    // No enrolments exist, proceed with deletion
    $class->delete();

    return  redirect()->back()->with('success', 'Class deleted successfully');
}


    public function deleteClassroom(ClassRoom $classroom)
    {
        $classroom->delete();

        return redirect()->back()->with('success', 'Classroom deleted successfully');
    }

    public function deleteDepartment(Department $department)
    {
        $teachersCount = $department->teachers()->count();

    if ($teachersCount > 0) {
        // Enrolments exist, so class cannot be deleted
        return redirect()->back()->with('error', 'Cannot delete Department with teachers');
    }
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

    // Retrieve students based on class, section, and active academic year
    $students = Enrollment::where('class_id', $classId)
                          ->where('section_id', $sectionId)
                          ->where('session_id', $activeAcademicYearId)
                          ->get();

    return view('backend.admin.student.list', compact('students'));
}

public function promoteStudents(Request $request)
{
    $classFrom = $request->input('class_id');
    $classTo = $request->input('class_id_to');
    $sessionFrom = $request->input('session_from');
    $sessionTo = $request->input('session_to');

    // Check if class ID or section ID is invalid
    if (!$classFrom || !$classTo || !$sessionFrom || !$sessionTo) {
        return view('backend.admin.empty');
    }

    // Get the ID of the active academic year
    $activeAcademicYearId = AcademicYear::where('status', 1)->value('id');

    // Retrieve students based on class, section, and active academic year
    $students = Enrollment::where('class_id', $classFrom)
                          ->where('session_id', $activeAcademicYearId)
                          ->get();

     $classToName = SchoolClass::where('id', $classTo)->value('name');
     $classFromName = SchoolClass::where('id', $classFrom)->value('name');
     $sessionFromName = AcademicYear::where('id', $sessionFrom)->value('name');
     $sessionToName = AcademicYear::where('id', $sessionTo)->value('name');

    return view('backend.admin.promotion.list', compact('students', 'classFromName', 'classToName', 'sessionFromName', 'sessionToName'));
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
    $timetables = Timetable::where('class_id', $class)
                        ->where('section_id', $section)
                          ->where('session_id', $activeAcademicYearId)
                          ->get();

    return view('backend.admin.routine.list', compact('timetables'));
}


public function filterTeachers(Request $request)
{
    $classId = $request->input('class_id');
    $sectionId = $request->input('section_id');
    $subjectId = $request->input('subject_id');

    // Check if class ID or section ID is invalid
    if (!$classId || !$sectionId || !$subjectId) {
        return view('backend.admin.empty');
    }

    // Retrieve all teachers
    $teachers = Teacher::all();

    // Fetch permissions for the given class, section, and subject
    $permissions = Permission::whereIn('user_id', $teachers->pluck('user_id'))
        ->where('class_id', $classId)
        ->where('section_id', $sectionId)
        ->where('subject_id', $subjectId)
        ->get();

    // Associate each teacher with their permission (if exists)
    $teacherPermissions = [];
    foreach ($teachers as $teacher) {
        $permission = $permissions->where('user_id', $teacher->user_id)->first();
        $teacherPermissions[$teacher->user_id] = $permission ?? null;
    }

    return view('backend.admin.permission.list', compact('teachers', 'teacherPermissions'));
}

        public function togglePermission(Request $request)
        {
            $userId = $request->input('user_id');
            $classId = $request->input('class_id');
            $sectionId = $request->input('section_id');
            $subjectId = $request->input('subject_id');
            $columnName = $request->input('column_name');
            $value = $request->input('value');

            // Check if the permission record already exists
            $permission = Permission::where('user_id', $userId)
                ->where('class_id', $classId)
                ->where('section_id', $sectionId)
                ->where('subject_id', $subjectId)
                ->first();

            if ($permission) {
                // Update the specific permission
                $permission->$columnName = $value;
                $permission->save();
            } else {
                // Create a new permission record
                $permission = new Permission();
                $permission->user_id = $userId;
                $permission->class_id = $classId;
                $permission->section_id = $sectionId;
                $permission->subject_id = $subjectId;
                $permission->$columnName = $value;
                $permission->save();
            }

            //  return response()->json(['success' => true]);
            return response()->json(['success' => true, 'message' => 'Your success message here']);

        }

        public function createGallery(Request $request)
    {
        // Validate the form data
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'date_added' => 'required|date',
            'show_on_website' => 'required|in:0,1',
            'cover_image' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        // Handle file upload
        if ($request->hasFile('cover_image')) {
            $imagePath = $request->file('cover_image')->store('gallery', 'public');
        } else {
            $imagePath = null;
        }

        $date_added = date('Y-m-d', strtotime($request->input('date_added')));

        // Create a new gallery instance
        $gallery = new Gallery();
        $gallery->title = $request->input('title');
        $gallery->description = $request->input('description');
        $gallery->date_added = $date_added;
        $gallery->show_on_website = $request->input('show_on_website');
        $gallery->cover_image = $imagePath;
        $gallery->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Gallery created successfully.');
    }

    public function updateGallery(Request $request, $id)
{
    // Validate the form data
    $request->validate([
        // Validation rules...
    ]);

    // Find the gallery by ID
    $gallery = Gallery::findOrFail($id);

    // Update the gallery title, description, and show_on_website status
    $gallery->title = $request->input('title');
    $gallery->description = $request->input('description');
    $gallery->show_on_website = $request->input('show_on_website');

    // Check if a new cover image is uploaded
    if ($request->hasFile('cover_image')) {
        $coverImage = $request->file('cover_image');
        $coverImagePath = $coverImage->store('gallery', 'public');
        $gallery->cover_image = $coverImagePath;
    }

    // Save the updated gallery
    $gallery->save();

    // Redirect back with a success message
    return redirect()->back()->with('success', 'Gallery updated successfully.');
}

        public function addPhoto(Request $request, $id)
            {
                // Validate the form data
                $request->validate([
                    'gallery_photo' => 'required|image|mimes:jpeg,png,jpg,gif',
                ]);

                // Get the gallery
                $gallery = Gallery::findOrFail($id);

                // Store the uploaded photo
                $imagePath = $request->file('gallery_photo')->store('gallery_photos', 'public');

                // Create a new GalleryImage model
                $galleryImage = new GalleryImage();
                $galleryImage->gallery_id = $gallery->id;
                $galleryImage->image = $imagePath;
                $galleryImage->save();

                // Redirect back with a success message
                return redirect()->back()->with('success', 'Photo added to gallery successfully.');
            }

            public function deleteImage($id)
        {
            $image = GalleryImage::findOrFail($id);
            $image->delete();
            return redirect()->back()->with('success', 'Image deleted successfully.');
        }

    public function deleteGallery($id)
    {
        $gallery = Gallery::findOrFail($id);
        $gallery->images()->delete();
        $gallery->delete();
        return redirect()->back()->with('success', 'Gallery deleted successfully.');
    }

    public function addClassTimetable(Request $request)
{
    // Validate the incoming request data
    $validatedData = $request->validate([
        'class_id' => 'required',
        'section_id' => 'required',
        'subject_id' => 'required',
        'teacher_id' => 'required',
        'room_id' => 'required',
        'day' => 'required',
        'starting_hour' => 'required',
        'starting_minute' => 'required',
        'ending_hour' => 'required',
        'ending_minute' => 'required',
    ]);

    // Get the ID of the active academic year
    $activeAcademicYearId = AcademicYear::where('status', 1)->value('id');

    // Create a new timetable instance with provided data
    $timetable = Timetable::create([
        'class_id' => $validatedData['class_id'],
        'section_id' => $validatedData['section_id'],
        'subject_id' => $validatedData['subject_id'],
        'teacher_id' => $validatedData['teacher_id'],
        'room_id' => $validatedData['room_id'],
        'day' => $validatedData['day'],
        'starting_hour' => $validatedData['starting_hour'],
        'starting_minute' => $validatedData['starting_minute'],
        'ending_hour' => $validatedData['ending_hour'],
        'ending_minute' => $validatedData['ending_minute'],
        'session_id' => $activeAcademicYearId,
    ]);

    // Check if timetable was created successfully
    if ($timetable) {
        // If created successfully, redirect back with success message
        return redirect()->back()->with('success', 'Timetable added successfully');
    } else {
        // If there's an error during creation, redirect back with error message
        return redirect()->back()->with('error', 'Failed to add timetable');
    }
}


   public function createExam(Request $request)
{
    // Validate the incoming request data
    $validatedData = $request->validate([
        'exam_name' => 'required|string|max:255',
        'starting_date' => 'required|date_format:d-m-Y',
        'ending_date' => 'required|date_format:d-m-Y|after:starting_date',
    ]);

    // Format the dates to 'Y-m-d' format for MySQL
    $starting_date = \DateTime::createFromFormat('d-m-Y', $validatedData['starting_date'])->format('Y-m-d');
    $ending_date = \DateTime::createFromFormat('d-m-Y', $validatedData['ending_date'])->format('Y-m-d');
    $activeAcademicYearId = AcademicYear::where('status', 1)->value('id');
    // Create the exam using the validated data
    $exam = Exam::create([
        'name' => $validatedData['exam_name'],
        'starting_date' => $starting_date,
        'ending_date' => $ending_date,
        'session_id' => $activeAcademicYearId,
        // You can add more fields here if needed
    ]);

    // Return a response indicating success or failure
    if ($exam) {
        return redirect()->back()->with('success', 'Exam created successfully');
    } else {
        return redirect()->back()->with('error', 'Failed to create exam');
    }
}

   public function createAcademicYear(Request $request)
{
    // Validate the incoming request data
    $validatedData = $request->validate([
        'name' => 'required|string|max:50',
    ]);

    // Create the exam using the validated data
    $academicYear = AcademicYear::create([
        'name' => $validatedData['name'],
    ]);

    // Return a response indicating success or failure
    if ($academicYear) {
        return redirect()->back()->with('success', 'academic Year created successfully');
    } else {
        return redirect()->back()->with('error', 'Failed to create academic Year');
    }
}

public function updateExam(Request $request, $id)
{
    // Find the exam by ID
    $exam = Exam::findOrFail($id);

    // Validate the incoming request data
    $validatedData = $request->validate([
        'exam_name' => 'required|string|max:255',
        'starting_date' => 'required|date_format:d-m-Y',
        'ending_date' => 'required|date_format:d-m-Y|after:starting_date',
    ]);

    // Update the exam using the validated data
    $exam->update([
        'name' => $validatedData['exam_name'],
        'starting_date' => \DateTime::createFromFormat('d-m-Y', $validatedData['starting_date'])->format('Y-m-d'),
        'ending_date' => \DateTime::createFromFormat('d-m-Y', $validatedData['ending_date'])->format('Y-m-d'),
        // You can add more fields here if needed
    ]);

    // Return a response indicating success or failure
    if ($exam) {
        return redirect()->back()->with('success', 'Exam updated successfully');
    } else {
        return redirect()->back()->with('error', 'Failed to update exam');
    }
}

public function deleteExam($id)
{
    $exam = Exam::findOrFail($id);
    $exam->delete();

    // Optionally, you can redirect to a specific route after deletion
    return redirect()->back()->with('success', 'Exam deleted successfully');
}

public function activateAcademicYear(Request $request)
{
    $selectedSessionId = $request->id;

    // Update status of all academic years to 0
    AcademicYear::where('status', 1)->update(['status' => 0]);

    // Set the status of the selected academic year to 1
    $academicYear = AcademicYear::findOrFail($selectedSessionId);
    $academicYear->status = 1;
    $academicYear->save();

    return redirect()->back()->with('success', 'Academic Year Activated');
}

}
