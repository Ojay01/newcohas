<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Admin;
use App\Http\Controllers\TeacherController;

Route::get('/', [App\Http\Controllers\Controller::class, 'index']);
Route::get('/about_us', [App\Http\Controllers\Controller::class, 'about'])->name('about');
Route::get('/noticeboard', [App\Http\Controllers\Controller::class, 'noticeboard'])->name('noticeboard');
Route::get('/galleries', [App\Http\Controllers\Controller::class, 'gallery'])->name('gallery');
Route::get('/events', [App\Http\Controllers\Controller::class, 'events'])->name('events');
Route::get('/admission', [App\Http\Controllers\Controller::class, 'admission'])->name('online.admission');
Route::get('/teachers', [App\Http\Controllers\Controller::class, 'teachers'])->name('teachers');
Route::get('/terms-and-conditions', [App\Http\Controllers\Controller::class, 'terms'])->name('terms');
Route::get('/privacy-policy', [App\Http\Controllers\Controller::class, 'privacy'])->name('privacy');
Route::get('/contact', [App\Http\Controllers\Controller::class, 'contact'])->name('contact');
Route::get('/student-assignmnets', [App\Http\Controllers\Controller::class, 'assignments'])->name('assignments');
Route::get('/tutorials', [App\Http\Controllers\Controller::class, 'tutorials'])->name('tutorials');
Route::get('/our-discipline', [App\Http\Controllers\Controller::class, 'discipline'])->name('discipline');
Route::post('/contact_us', [App\Http\Controllers\Controller::class, 'contactForm'])->name('contactForm');
Route::get('/gallery/{id}/images/', [App\Http\Controllers\Controller::class, 'galleryImages'])->name('galleryImages');

    Auth::routes();

    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(Admin::class)->prefix('admin')->group(function () {

    Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
    Route::get('/system-setting', [App\Http\Controllers\HomeController::class, 'systemSetting'])->name('setting');
    Route::get('/online-admission', [App\Http\Controllers\HomeController::class, 'onlineAdmission'])->name('admission');
    Route::get('/submitted_marks', [App\Http\Controllers\HomeController::class, 'submittedMarks'])->name('submitted.marks');
    Route::get('/website-settings', [App\Http\Controllers\HomeController::class, 'websiteSettings'])->name('websiteSettings');
    Route::get('/about-us-settings', [App\Http\Controllers\HomeController::class, 'aboutUsSettings'])->name('aboutUsSettings');
    Route::get('/gallery-settings', [App\Http\Controllers\HomeController::class, 'gallerySettings'])->name('gallerySettings');
    Route::get('/event-settings', [App\Http\Controllers\HomeController::class, 'eventSettings'])->name('eventSettings');
    Route::get('/gallery/{id}/images/', [App\Http\Controllers\HomeController::class, 'galleryImageSettings'])->name('galleryImageSettings');
    Route::get('/login-image-settings', [App\Http\Controllers\HomeController::class, 'others'])->name('others');
    Route::get('/noticeboard-settings', [App\Http\Controllers\HomeController::class, 'noticeboardSettings'])->name('noticeboardSettings');
    Route::get('/terms_and_Conditions-settings', [App\Http\Controllers\HomeController::class, 'termsSettings'])->name('termsSettings');
    Route::get('/privacy_policy-settings', [App\Http\Controllers\HomeController::class, 'privacySettings'])->name('privacySettings');
    Route::get('/teachers', [App\Http\Controllers\HomeController::class, 'teachers'])->name('admin.teachers');
    Route::get('/homepage_settings', [App\Http\Controllers\HomeController::class, 'homepageSettings'])->name('homepageSettings');
    Route::get('/Physics_lab', [App\Http\Controllers\HomeController::class, 'labSettings'])->name('labSettings');
    Route::get('/bio_lab', [App\Http\Controllers\HomeController::class, 'bioLab'])->name('bioLab');
    Route::get('/chem_lab', [App\Http\Controllers\HomeController::class, 'chemLab'])->name('chemLab');
    Route::get('/computer_lab', [App\Http\Controllers\HomeController::class, 'comLab'])->name('comLab');
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
    Route::get('/syllabus_settings', [App\Http\Controllers\HomeController::class, 'syllabus'])->name('syllabus');
    Route::get('/departments_settings', [App\Http\Controllers\HomeController::class, 'department'])->name('department');
    Route::get('/event_callender_settings', [App\Http\Controllers\HomeController::class, 'eventCalender'])->name('eventCalender');
    Route::get('/student_assignments', [App\Http\Controllers\HomeController::class, 'studentAssignment'])->name('studentAssignment');
    Route::get('/student_tutorials', [App\Http\Controllers\HomeController::class, 'studentTutorial'])->name('studentTutorial');
    Route::get('/student_attendance', [App\Http\Controllers\HomeController::class, 'attendance'])->name('attendance');
    Route::get('/student_promotion', [App\Http\Controllers\HomeController::class, 'promotion'])->name('promotion');
    Route::get('/student_exam', [App\Http\Controllers\HomeController::class, 'adminExam'])->name('admin.exam');
    Route::get('/student_marks', [App\Http\Controllers\HomeController::class, 'adminMarks'])->name('admin.marks');
    Route::get('/academic_years', [App\Http\Controllers\HomeController::class, 'academicYear'])->name('academic.year');
    Route::get('/edit_student/{id} ', [App\Http\Controllers\HomeController::class, 'editStudent'])->name('admin.edit.student');
    Route::get('/submitted-marks', 'App\Http\Controllers\HomeController@allSubmittedMarks')->name('admin.submitted.marks');
    Route::get('/download-marks', 'App\Http\Controllers\HomeController@downloadMarks')->name('admin.download.marks');
    Route::get('/students_marks', 'App\Http\Controllers\HomeController@manageMarks')->name('admin.manageMarks');



    Route::post('profile/update', 'App\Http\Controllers\AdminController@update')->name('update-profile');
    Route::post('profile/update-password', 'App\Http\Controllers\AdminController@updatePassword')->name('admin.update_password');
    Route::post('settings/update', 'App\Http\Controllers\FrontendController@updateSettings')->name('update-settings');
    Route::post('upload-logos', 'App\Http\Controllers\FrontendController@uploadLogos')->name('upload-logos');
    Route::post('/update-general-settings', [App\Http\Controllers\FrontendController::class, 'updateGeneralSettings'])->name('update-general-settings');
    Route::post('/login_banner-settings', [App\Http\Controllers\FrontendController::class, 'loginBanner'])->name('loginBanner');
    Route::post('/about_us_update', [App\Http\Controllers\FrontendController::class, 'updateAboutUs'])->name('updateAboutUs');
    Route::post('/update_privacy_policy', [App\Http\Controllers\FrontendController::class, 'updatePrivactPolicySettings'])->name('updatePrivactPolicySettings');
    Route::post('/update_terms_and_condition', [App\Http\Controllers\FrontendController::class, 'updateTermsAndConditionSettings'])->name('updateTermsAndConditionSettings');
    Route::post('/update-homepage-slider-settings', 'App\Http\Controllers\FrontendController@updateSliders')->name('updateSliders');
    Route::post('/update_physics_lab', 'App\Http\Controllers\FrontendController@physicsLab')->name('physicsLab');
    Route::post('/update_chemistry_lab', 'App\Http\Controllers\FrontendController@chemistryLab')->name('chemistryLab');
    Route::post('/update_chem_lab', 'App\Http\Controllers\FrontendController@biologyLab')->name('biologyLab');
    Route::post('/update_computer_lab', 'App\Http\Controllers\FrontendController@computerLab')->name('computerLab');
    Route::post('/school_settings', 'App\Http\Controllers\FrontendController@schoolSetting')->name('schoolSetting');
    Route::post('/add_class', [App\Http\Controllers\AdminController::class, 'addClass'])->name('addClass');
    Route::post('/add_class_rooms', [App\Http\Controllers\AdminController::class, 'addClassRoom'])->name('addClassRoom');
    Route::post('/add_section', [App\Http\Controllers\AdminController::class, 'addSection'])->name('addSection');
    Route::post('/add_subject', [App\Http\Controllers\AdminController::class, 'addSubject'])->name('addSubject');
    Route::post('/add_department', [App\Http\Controllers\AdminController::class, 'addDepartment'])->name('addDepartment');
    Route::post('/classes/edit/{id}', 'App\Http\Controllers\AdminController@updateClass')->name('classes.edit');
    Route::post('/classroom/edit/{id}', 'App\Http\Controllers\AdminController@updateClassroom')->name('classroom.edit');
    Route::post('/classes/{class_id}/sections', [App\Http\Controllers\AdminController::class, 'addSection'])->name('sections.store');
    Route::post('/update/department/{department_id}', [App\Http\Controllers\AdminController::class, 'updateDepartment'])->name('department.update');
    Route::post('/update/subject/{subject_id}', [App\Http\Controllers\AdminController::class, 'updateSubject'])->name('subject.update');
    Route::delete('/sections/{section}', 'App\Http\Controllers\AdminController@deleteSection')->name('sections.destroy');
    Route::delete('/classes/{class}', 'App\Http\Controllers\AdminController@deleteClass')->name('classes.destroy');
    Route::delete('/classrooms/{classroom}', 'App\Http\Controllers\AdminController@deleteClassroom')->name('classroom.destroy');
    Route::delete('/departments/{department}', 'App\Http\Controllers\AdminController@deleteDepartment')->name('department.destroy');
    Route::delete('/subject/{subject}', 'App\Http\Controllers\AdminController@deleteSubject')->name('subject.destroy');
    Route::get('/section/list/{class_id}', 'App\Http\Controllers\AdminController@fetchSections')->name('section.list');
    Route::get('/filter-students', 'App\Http\Controllers\AdminController@filterStudents')->name('filterStudents');
    Route::get('/filter_teachers_permission', 'App\Http\Controllers\AdminController@filterTeachers')->name('filterTeachers');
    Route::get('/promote_students', 'App\Http\Controllers\AdminController@promoteStudents')->name('promoteStudents');
    Route::get('/class_routine', 'App\Http\Controllers\AdminController@classRoutine')->name('classRoutine');
    Route::post('/toggle-permission', 'App\Http\Controllers\AdminController@togglePermission')->name('toggle.permission');
    Route::post('/create_gallery', 'App\Http\Controllers\AdminController@createGallery')->name('create.gallery');
    Route::post('/galleries/{id}', [App\Http\Controllers\AdminController::class, 'updateGallery'])->name('updateGallery');
    Route::post('/galleries/{id}/add-photo', [App\Http\Controllers\AdminController::class, 'addPhoto'])->name('addPhotoToGallery');
    Route::delete('/delete/gallery/images/{id}', [App\Http\Controllers\AdminController::class, 'deleteImage'])->name('deleteImage');
    Route::delete('/galleries/{id}', [App\Http\Controllers\AdminController::class, 'deleteGallery'])->name('deleteGallery');
    Route::post('/add_timetable', [App\Http\Controllers\AdminController::class, 'addClassTimetable'])->name('addTimetable');
    Route::post('/create_exam', [App\Http\Controllers\AdminController::class, 'createExam'])->name('exam.create');
    Route::post('/create_academic_year', [App\Http\Controllers\AdminController::class, 'createAcademicYear'])->name('academic.year.create');
    Route::post('/update_exam/{id}', [App\Http\Controllers\AdminController::class, 'updateExam'])->name('exam.update');
    Route::delete('/exams/{exam}', 'App\Http\Controllers\AdminController@deleteExam')->name('exam.delete');
    Route::post('/update-academic-year-status', 'App\Http\Controllers\AdminController@activateAcademicYear')->name('update.academic.year.status');



});


Route::prefix('teacher')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('teacher');
    Route::get('/teachers', [TeacherController::class, 'teachers'])->name('teacher.teachers');
    Route::get('/assigments', [TeacherController::class, 'assignments'])->name('teacher.assignments');
    Route::get('/tutorials', [TeacherController::class, 'tutorials'])->name('teacher.tutorials');
    Route::get('/subjects', [TeacherController::class, 'subjects'])->name('teacher.subjects');
    Route::get('/all_classes', [TeacherController::class, 'classes'])->name('teacher.classes');
    Route::get('/class_rooms', [TeacherController::class, 'classrooms'])->name('teacher.classroom');
    Route::get('/exams', [TeacherController::class, 'exams'])->name('teacher.exams');
    Route::get('/my_profile', [TeacherController::class, 'profile'])->name('teacher.profile');
    Route::get('/students', [TeacherController::class, 'students'])->name('teacher.students');
    Route::get('/my_timetable', [TeacherController::class, 'routine'])->name('teacher.routine');
    Route::get('/manage_marks', [TeacherController::class, 'marks'])->name('teacher.marks');
    
    Route::post('profile/update', 'App\Http\Controllers\TeacherController@updateteacher')->name('update_teacher_profile');
    Route::post('profile/update-password', 'App\Http\Controllers\TeacherController@updateteacherPassword')->name('teacher.update_password');
    Route::get('/section/list/{class_id}', 'App\Http\Controllers\TeacherController@fetchSections')->name('teacher.section.list');
    Route::get('/filter-students', 'App\Http\Controllers\TeacherController@filterStudents')->name('teacher.filterStudents');
    Route::get('/class_routine', 'App\Http\Controllers\TeacherController@classRoutine')->name('teacher.classRoutine');
    Route::get('/student_marks', 'App\Http\Controllers\TeacherController@manageMarks')->name('teacher.manageMarks');
   Route::post('/submit-marks', 'App\Http\Controllers\TeacherController@submitMarks')->name('teacher.submit.marks');

});