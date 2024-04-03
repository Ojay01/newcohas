<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('frontend.index');
});
Route::get('/about_us', [App\Http\Controllers\Controller::class, 'about'])->name('about');
Route::get('/noticeboard', [App\Http\Controllers\Controller::class, 'noticeboard'])->name('noticeboard');
Route::get('/galleries', [App\Http\Controllers\Controller::class, 'gallery'])->name('gallery');
Route::get('/events', [App\Http\Controllers\Controller::class, 'events'])->name('events');
Route::get('/admission', [App\Http\Controllers\Controller::class, 'admission'])->name('admission');
Route::get('/teachers', [App\Http\Controllers\Controller::class, 'teachers'])->name('teachers');
Route::get('/terms-and-conditions', [App\Http\Controllers\Controller::class, 'terms'])->name('terms');
Route::get('/privacy-policy', [App\Http\Controllers\Controller::class, 'privacy'])->name('privacy');
Route::get('/contact', [App\Http\Controllers\Controller::class, 'contact'])->name('contact');
Route::get('/student-assignmnets', [App\Http\Controllers\Controller::class, 'assignments'])->name('assignments');
Route::get('/tutorials', [App\Http\Controllers\Controller::class, 'tutorials'])->name('tutorials');
Route::get('/our-discipline', [App\Http\Controllers\Controller::class, 'discipline'])->name('discipline');


    Auth::routes();

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
    


Route::prefix('admin')->group(function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
    Route::get('/system-setting', [App\Http\Controllers\HomeController::class, 'systemSetting'])->name('setting');
    Route::get('/online-admission', [App\Http\Controllers\HomeController::class, 'onlineAdmission'])->name('admission');
    Route::get('/website-settings', [App\Http\Controllers\HomeController::class, 'websiteSettings'])->name('websiteSettings');
    Route::get('/about-us-settings', [App\Http\Controllers\HomeController::class, 'aboutUsSettings'])->name('aboutUsSettings');
    Route::get('/gallery-settings', [App\Http\Controllers\HomeController::class, 'gallerySettings'])->name('gallerySettings');
    Route::get('/event-settings', [App\Http\Controllers\HomeController::class, 'eventSettings'])->name('eventSettings');
    Route::get('/gallery-image-settings', [App\Http\Controllers\HomeController::class, 'galleryImageSettings'])->name('galleryImageSettings');
    Route::get('/login-image-settings', [App\Http\Controllers\HomeController::class, 'others'])->name('others');
    Route::get('/noticeboard-settings', [App\Http\Controllers\HomeController::class, 'noticeboardSettings'])->name('noticeboardSettings');
    Route::get('/terms_and_Conditions-settings', [App\Http\Controllers\HomeController::class, 'termsSettings'])->name('termsSettings');
    Route::get('/privacy_policy-settings', [App\Http\Controllers\HomeController::class, 'privacySettings'])->name('privacySettings');
    Route::get('/teachers', [App\Http\Controllers\HomeController::class, 'teachers'])->name('teachers');
    Route::get('/homepage_settings', [App\Http\Controllers\HomeController::class, 'homepageSettings'])->name('homepageSettings');
    Route::get('/laboratory_settings', [App\Http\Controllers\HomeController::class, 'labSettings'])->name('labSettings');
    Route::get('/school_settings', [App\Http\Controllers\HomeController::class, 'schoolSettings'])->name('schoolSettings');
    Route::get('/teachers_permission', [App\Http\Controllers\HomeController::class, 'teacherPermission'])->name('teacherPermission');
    Route::get('/student_admission', [App\Http\Controllers\HomeController::class, 'studentAdmission'])->name('studentAdmission');
    Route::get('/students', [App\Http\Controllers\HomeController::class, 'students'])->name('students');
    Route::get('/parents', [App\Http\Controllers\HomeController::class, 'parents'])->name('parents');
    Route::get('/student_single_admission', [App\Http\Controllers\HomeController::class, 'singleAdmission'])->name('singleAdmission');
    Route::get('/student_bulk_admission', [App\Http\Controllers\HomeController::class, 'bulkAdmission'])->name('bulkAdmission');
    Route::get('/administrators', [App\Http\Controllers\HomeController::class, 'admins'])->name('admins');
    Route::get('/classes', [App\Http\Controllers\HomeController::class, 'classes'])->name('classes');
    Route::get('/subjects', [App\Http\Controllers\HomeController::class, 'subjects'])->name('subjects');
    Route::get('/routine', [App\Http\Controllers\HomeController::class, 'routine'])->name('routine');
    Route::get('/class_room', [App\Http\Controllers\HomeController::class, 'classRoom'])->name('classRoom');
});


Route::prefix('teacher')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('teacher');

   
});