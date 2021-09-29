<?php

use Illuminate\Support\Facades\App;
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

Route::get('/', [\App\Http\Controllers\HomeController::class, 'welcome']);

Auth::routes(['register' => false]);

Route::view('ppdb', 'ppdb');
Route::post('ppdb', [\App\Http\Controllers\PpdbController::class, 'form']);
Route::redirect('home', 'dashboard');

Route::group(['namespace'=>'App\Http\Controllers'], function(){
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard')->middleware('auth');

    Route::view('/profile', 'auth.profile');
    Route::put('/profile/update-profile', 'HomeController@update_profile');
    Route::put('/profile/update-password', 'HomeController@update_password');
    Route::post('/profile/set-blogger', 'HomeController@set_blogger');
    Route::post('/profile/set_about_me', 'HomeController@set_about_me');

    Route::prefix('admin')->middleware(['auth','role:admin'])->group(function(){
        Route::get('/', 'DashboardController@admin');

        Route::resource('subject', SubjectController::class)->except(['create','show','edit']);
        Route::resource('major', MajorController::class);

        Route::resource('teacher', TeacherController::class);
        Route::post('teacher/delete-selected', 'TeacherController@delete_selected');
        Route::post('teacher/import', 'TeacherController@import');

        Route::resource('student', StudentController::class);
        Route::post('student/delete-selected', 'StudentController@delete_selected');
        Route::post('student/import', 'StudentController@import');

        // Route::resource('blogger', BloggerController::class);
        // Route::post('blogger/delete-selected', 'BloggerController@delete_selected');

        Route::resource('setting', SettingController::class);

        Route::resource('testimonial', TestimonialController::class);

        Route::resource('gallery', GalleryController::class);

        Route::resource('skill', SkillController::class);
        Route::get('get_skills', 'SkillController@ajax');
        Route::post('skill/delete-selected', 'SkillController@delete_selected');

        Route::get('ppdb', 'PpdbController@penyetujuan')->name('ppdb.penyetujuan');

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

        Route::get('naik-kelas', 'StudentController@naik_kelas');
        Route::post('naik-kelas', 'StudentController@naik_kelas_store');

        Route::resource('absen', AbsenController::class)->only(['index','store']);
        Route::get('absen/history', 'AbsenController@history')->name('absen.history');
        Route::get('absen/history/{date}/{filter}', 'AbsenController@history_show')->name('absen.history.detail');
        Route::post('absen/history/{date}/{filter?}', 'AbsenController@history_export')->name('absen.history.export');
    });

    Route::prefix('student')->middleware(['auth','role:student'])->group(function(){
        Route::resource('task', TaskController::class)->except(['edit', 'update', 'delete']);
        Route::get('absen', 'AbsenController@me')->name('absen.me');
    });

    Route::resource('blog', BlogController::class)->middleware(['auth']);
    Route::post('blog/delete-selected', 'BlogController@delete_selected');

});
Route::get('blogs/{category?}/{blog?}', [App\Http\Controllers\HomeController::class,'blog']);


Route::group(['prefix' => 'filemanager'], function() {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
