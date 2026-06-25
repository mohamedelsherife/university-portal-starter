<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('departments.index');
});

Route::get('/login', function () {
    return redirect()->route('departments.index');
})->name('login');

Route::get('/register', function () {
    return view('auth.sign-up');
})->name('register');

Route::resource('departments', DepartmentController::class)
    ->except('show');

Route::resource('students', StudentController::class)
    ->except('show');

Route::resource('courses', CourseController::class)
    ->except('show');

Route::resource('professors', ProfessorController::class)
    ->except('show');

Route::resource('enrollments', EnrollmentController::class)
    ->except('show');
