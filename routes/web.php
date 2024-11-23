<?php

use App\Http\Controllers\adminControll;
use App\Http\Controllers\authControll;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TypeCourseController;
use App\Http\Controllers\userControll;
use Illuminate\Support\Facades\Route;



Route::get('/', [userControll::class, 'index'])->name('index');



// Authentication
Route::post('register-user', [authControll::class, 'daftarUser']);
Route::post('register-guru', [authControll::class, 'daftarGuru']);

Route::post('login-user', [authControll::class, 'loginUser']);
Route::post('login-guru', [authControll::class, 'loginGuru']);

Route::post('logout', [authControll::class, 'logout']);
// Authentication



// USER

// Editz
Route::post('/editprofil_name', [userControll::class, 'editName']);
Route::post('/editprofil_email', [userControll::class, 'editEmail']);
Route::post('/editprofil_notelp', [userControll::class, 'editNotelp']);
Route::post('/editprofil_tl', [userControll::class, 'editTl']);
Route::post('/editprofil_jk', [userControll::class, 'editJk']);
Route::post('/editprofil_profil', [userControll::class, 'editProfil']);
// Editz

// USER



// TEACHER

Route::get('/guru-index', [TeacherController::class, 'index'])->name('guru');

Route::get('/guru-course', [TeacherController::class, 'course']);

Route::post('/upload', [TeacherController::class, 'upload'])->name('upload');

// TEACHER




// ADMIN

Route::get('/admin-index', [adminControll::class, 'index']);



// Type Course
Route::get('/admin-course_type', [TypeCourseController::class, 'index']);


Route::post('/add-type-course', [TypeCourseController::class, 'store']);
Route::post('/update-type-course', [TypeCourseController::class, 'update']);
Route::post('/delete-course_type', [TypeCourseController::class, 'destroy']);


// Type Course

// ADMIN

