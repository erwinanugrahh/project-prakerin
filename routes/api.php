<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('student/import', [App\Http\Controllers\StudentController::class, 'preview']);
Route::post('teacher/import', [App\Http\Controllers\TeacherController::class, 'preview']);
Route::get('get_testimonials', [App\Http\Controllers\TestimonialController::class, 'ajax']);
Route::post('testimonial/delete-selected', [App\Http\Controllers\TestimonialController::class, 'delete_selected']);
Route::post('teacher/{teacher}', [App\Http\Controllers\TeacherController::class, 'show']);
Route::post('student/{student}', [App\Http\Controllers\StudentController::class, 'show']);
Route::post('set-ppdb', [App\Http\Controllers\SettingController::class, 'store']);
