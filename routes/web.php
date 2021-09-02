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

Auth::routes(['register' => false]);


Route::group(['namespace'=>'App\Http\Controllers'], function(){
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard')->middleware('auth');

    Route::view('/profile', 'auth.profile');
    Route::put('/profile/update-profile', 'HomeController@update_profile');
    Route::put('/profile/update-password', 'HomeController@update_password');

    Route::prefix('admin')->middleware(['auth','role:admin'])->group(function(){
        Route::get('/', 'DashboardController@admin');

        Route::resource('subject', SubjectController::class)->except(['create','show','edit']);
        Route::resource('major', MajorController::class);

        Route::resource('teacher', TeacherController::class);
        Route::post('teacher/delete-selected', 'TeacherController@delete_selected');

        Route::resource('student', StudentController::class);
        Route::post('student/delete-selected', 'StudentController@delete_selected');

        Route::resource('blogger', BloggerController::class);
        Route::post('blogger/delete-selected', 'BloggerController@delete_selected');

        Route::get('request_blog', 'BlogController@request_blog')->name('blog.request');
        Route::post('request_blog/send_result', 'BlogController@send_result');
        Route::get('request_blog/{blog}/preview', 'BlogController@preview')->name('blog.preview');
    });

    Route::prefix('teacher')->middleware(['auth','role:admin,teacher'])->group(function(){
        Route::get('/', 'DashboardController@teacher');

        Route::resource('lesson', LessonController::class);
        Route::post('delete-selected', 'LessonController@delete_selected');
        Route::get('lesson/task/{task}', 'LessonController@task')->name('lesson.task');
        Route::post('lesson/task/{task}', 'LessonController@update_task')->name('lesson.task-update');

        Route::resource('absen', AbsenController::class)->only(['index','store']);
    });

    Route::prefix('student')->middleware(['auth','role:student'])->group(function(){
        Route::resource('task', TaskController::class)->except(['edit', 'update', 'delete']);
    });

    Route::resource('blog', BlogController::class)->middleware(['auth','role:admin,blogger']);
    Route::post('blog/delete-selected', 'BlogController@delete_selected');
});

Route::group(['prefix' => 'filemanager'], function() {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
