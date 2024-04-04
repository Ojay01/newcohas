<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\Setting;
use App\Models\Class;
use App\Models\Subject;
use App\Models\Section;

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

    $class = new Class();
        $class->name = $validatedData['name'];
        // $class->description = $validatedData['description'];
        $class->save();

    return redirect()->back()->with('success', 'Class added successfully.');
}


    public function addSection(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'class_id' => 'required|exists:classes,id',
        ]);

        $section = new Section();
        $section->name = $validatedData['name'];
        $section->class_id = $validatedData['class_id'];
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
}
