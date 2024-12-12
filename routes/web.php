<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\AssessmentController;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('welcome');
});

Route::resource('students', StudentController::class);
Route::resource('lecturers', LecturerController::class);
Route::resource('subjects', SubjectController::class);
Route::resource('assessments', AssessmentController::class);
Route::resource('users', UserController::class);

Route::post('students/{student}/subjects', [StudentController::class, 'addSubject'])->name('students.addSubject');
Route::delete('students/{student}/subjects/{subject}', [StudentController::class, 'removeSubject'])->name('students.removeSubject');

// Add a subject to a lecturer// Remove a subject from a lecturer
Route::post('lecturers/{lecturer}/subjects', [LecturerController::class, 'addSubject'])->name('lecturers.addSubject');
Route::delete('lecturers/{lecturer}/subjects/{subject}', [LecturerController::class, 'removeSubject'])->name('lecturers.removeSubject');

// Add an assessment to a subject// Remove an assessment from a subject
Route::delete('subjects/{subject}/assessments/{assessment}', [SubjectController::class, 'removeAssessment'])->name('subjects.removeAssessment');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
