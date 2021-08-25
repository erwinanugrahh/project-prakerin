<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


Route::group(['namespace'=>'App\Http\Controllers'], function(){
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    Route::prefix('admin')->middleware(['auth','role:admin'])->group(function(){
        Route::get('/', 'DashboardController@admin');

        Route::resource('subject', SubjectController::class);

        Route::resource('teacher', TeacherController::class);

        Route::resource('student', StudentController::class);

        Route::resource('major', MajorController::class);

        Route::resource('blogger', BloggerController::class);
    });

    Route::prefix('teacher')->middleware(['auth','role:admin,teacher'])->group(function(){
        Route::get('/', 'DashboardController@teacher');

        Route::resource('lesson', LessonController::class);

        Route::resource('absen', AbsenController::class)->only(['index','store']);
    });

    Route::prefix('student')->middleware(['auth','role:student'])->group(function(){
        Route::resource('task', TaskController::class);
    });

    Route::resource('blog', BlogController::class)->middleware(['auth','role:admin,blogger']);
    });
