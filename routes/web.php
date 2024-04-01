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



Route::prefix('admin')->group(function () {
    Auth::routes();

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
    Route::get('/system-setting', [App\Http\Controllers\HomeController::class, 'systemSetting'])->name('setting');
});
