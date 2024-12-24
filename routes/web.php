<?php

use App\Http\Controllers\adminControll;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\authControll;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\FollowCourseController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TypeCourseController;
use App\Http\Controllers\UlasanController;
use App\Http\Controllers\userControll;
use Illuminate\Support\Facades\Route;



Route::get('/', [userControll::class, 'index'])->name('index');

Route::get('/filter/{id}', [userControll::class, 'filter']);



// Authentication
Route::post('/register-user', [authControll::class, 'daftarUser']);
Route::post('/register-guru', [authControll::class, 'daftarGuru']);

Route::post('/login-user', [authControll::class, 'loginUser']);
Route::post('/login-guru', [authControll::class, 'loginGuru']);

Route::post('/logout', [authControll::class, 'logout']);
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

// Course
Route::get('/course/{id}', [userControll::class, 'course']);
Route::get('/quiz/{id}', [userControll::class, 'quiz']);
Route::post('/store-answer', [AnswerController::class, 'store']);
// Course

Route::post('/follow-course', [FollowCourseController::class, 'follow']);
Route::post('/cancel-follow-course', [FollowCourseController::class, 'cancel']);
Route::post('/post-ulasan', [UlasanController::class, 'post']);

Route::get('/profil', [userControll::class, 'profil']);



// USER



// TEACHER

Route::get('/guru-index', [TeacherController::class, 'index'])->name('guru');
Route::get('/guru-rating', [TeacherController::class, 'rating']);

Route::post('/upload', [TeacherController::class, 'upload'])->name('upload');

// Editz
Route::post('/guru-editprofil_name', [TeacherController::class, 'editName']);
Route::post('/guru-editprofil_email', [TeacherController::class, 'editEmail']);
Route::post('/guru-editprofil_notelp', [TeacherController::class, 'editNotelp']);
Route::post('/guru-editprofil_tl', [TeacherController::class, 'editTl']);
Route::post('/guru-editprofil_jk', [TeacherController::class, 'editJk']);
Route::post('/guru-editprofil_profil', [TeacherController::class, 'editProfil']);
// Editz

// Course
Route::get('/guru-course', [TeacherController::class, 'course']);
Route::post('/add-course', [CourseController::class, 'store']);
Route::post('/update-course', [CourseController::class, 'update']);
Route::post('/delete-course', [CourseController::class, 'destroy']);
// Course

// Course Detail

Route::get('/guru-course_detail/{id}', [TeacherController::class, 'courseDetail']);
Route::post('/add-materi', [MateriController::class, 'store']);
Route::post('/update-materi', [MateriController::class, 'update']);
Route::post('/delete-materi', [MateriController::class, 'destroy']);

Route::get('/preview/quiz/{id}', [MateriController::class, 'play']);

Route::post('/add-quiz', [QuizController::class, 'store']);
Route::post('/update-quiz', [QuizController::class, 'update']);
Route::post('/delete-quiz', [QuizController::class, 'destroy']);
// Course Detail

// Answer

Route::get('/guru-answer_request', [TeacherController::class, 'answer']);
Route::get('/guru-answer_verification/{id}', [TeacherController::class, 'answerVerification']);

Route::post('/store-right_answer', [AnswerController::class, 'rightAnswer']);
Route::post('/store-wrong_answer', [AnswerController::class, 'wrongAnswer']);
// Answer


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

