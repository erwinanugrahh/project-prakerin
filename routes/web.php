<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\SubjectController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth','role:admin'])->group(function(){
    Route::resource('subject', App\Http\Controllers\SubjectController::class);

    Route::resource('teacher', App\Http\Controllers\TeacherController::class);

    Route::resource('student', App\Http\Controllers\StudentController::class);

    Route::resource('major', App\Http\Controllers\MajorController::class);
});

Route::prefix('teacher')->middleware(['auth','role:teacher'])->group(function(){
    Route::resource('lesson', LessonController::class);
});
