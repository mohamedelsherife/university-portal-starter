<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('departments.index');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


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
