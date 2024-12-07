<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\LogoutController;

use App\Models\Course;
use App\Http\Controllers\CourseController;

use App\Http\Controllers\ProfileController;

use App\Http\Controllers\CourseScheduleController;


Route::get('/', function () {
    return view('auth/login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',])->group(function ()
    {

    //sidebar
    //dashboard
    Route::get('/kict-dashboard', function () {
        $courses = Course::all();
        return view('admin.kict-dashboard', compact('courses'));
    })->name('kict-dashboard');

    Route::get('/teacher-dashboard', function () {
        return view('advisor/teacher-dashboard');
    })->name('teacher-dashboard');

    Route::get('/dashboard', function () {
        return view('student/student-dashboard');
    })->name('dashboard');

    //students
    Route::get('/students', function () {
        return view('students');
    })->name('students');

    Route::get('/student-details', function () {
        return view('student-details');
    })->name('student-details');

    Route::get('/add-student', function () {
        return view('add-student');
    })->name('add-student');

    Route::get('/edit-student', function () {
        return view('edit-student');
    })->name('edit-student');

    //profile
    Route::middleware(['auth'])->group(function () {
        Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
        Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    });

    //course
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/course/add-course', [CourseController::class, 'create'])->name('course.create');
        Route::post('/course/add-course', [CourseController::class, 'store'])->name('course.store');
        Route::get('/course/{course_code}/edit', [CourseController::class, 'edit'])->name('course.edit');
        Route::put('/course/{course_code}', [CourseController::class, 'update'])->name('course.update');
        Route::post('/course/delete/{course_code}', [CourseController::class, 'destroy'])->name('course.destroy');
    });
    
    Route::middleware(['role:admin|advisor|student'])->group(function () {
        Route::get('/course', [CourseController::class, 'index'])->name('course.index');
        Route::get('/course/{course}', [CourseController::class, 'show'])->name('course.show'); 
    });

    //taskbar
    Route::post('/logout', [LogoutController::class, 'destroy'])->name('logout');
});
