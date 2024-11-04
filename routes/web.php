<?php

use App\Http\Controllers\authControll;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\userControll;
use Illuminate\Support\Facades\Route;


Route::get('/', [userControll::class, 'index'])->name('index');

Route::get('/guru', [TeacherController::class, 'index'])->name('guru');


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
