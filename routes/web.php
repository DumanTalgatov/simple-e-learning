<?php

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

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::get('/course', 'App\Http\Controllers\CourseController@index')->name('course.index');

Route::resource('/course', 'App\Http\Controllers\CourseController')->except('index', 'show')->middleware('auth');

Route::get('/course/{course}/enroll', 'App\Http\Controllers\CourseController@enroll')->name('course.enroll');

Route::get('/course/{course}/unenroll', 'App\Http\Controllers\CourseController@unenroll')->name('course.unenroll');

Route::get('/course/{course}/complete', 'App\Http\Controllers\CourseController@complete')->name('course.complete');

Route::get('/course/{course}', 'App\Http\Controllers\CourseController@show')->name('course.show');

Route::resource('/user', 'App\Http\Controllers\UserController')->except('show')->middleware('auth');

Route::get('/user/{user}/account', 'App\Http\Controllers\UserController@account')->name('user.account');

Route::get('/dashboard', 'App\Http\Controllers\EnrollmentController@dashboard')->name('dashboard')->middleware('auth');

Route::get('/dashboard/{user}/{course}/approve', 'App\Http\Controllers\EnrollmentController@approve')->name('enrollment.approve');

Route::get('/dashboard/{user}/{course}/disapprove', 'App\Http\Controllers\EnrollmentController@disapprove')->name('enrollment.disapprove');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
