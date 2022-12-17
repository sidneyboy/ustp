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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', 'ProfileController@index')->name('profile');
Route::put('/profile', 'ProfileController@update')->name('profile.update');

Route::get('/about', function () {
    return view('about');
})->name('about');



Route::get('/secret', 'Ustp_controller@secret')->name('secret');
Route::get('/department', 'Ustp_controller@department')->name('department');
Route::post('/department_process', 'Ustp_controller@department_process')->name('department_process');
Route::post('/department_update_process', 'Ustp_controller@department_update_process')->name('department_update_process');

Route::get('/student', 'Ustp_controller@student')->name('student');
Route::post('/student_process', 'Ustp_controller@student_process')->name('student_process');

Route::get('/subject', 'Ustp_controller@subject')->name('subject');
Route::post('/subject_process', 'Ustp_controller@subject_process')->name('subject_process');

Route::get('/enroll', 'Ustp_controller@enroll')->name('enroll');
Route::post('/enroll_proceed', 'Ustp_controller@enroll_proceed')->name('enroll_proceed');
Route::post('/enroll_process', 'Ustp_controller@enroll_process')->name('enroll_process');

Route::get('/chair_register', 'Ustp_controller@chair_register')->name('chair_register');


Route::get('/enrolled_students', 'Ustp_controller@enrolled_students')->name('enrolled_students');

Route::post('/ustp_login', 'Ustp_controller@ustp_login')->name('ustp_login');
Route::get('/student_data/{student_id}/{code}', 'Ustp_controller@student_data')->name('student_data');

Route::post('/approved/', 'Ustp_controller@approved')->name('approved');

Route::get('/reject/{code}/{id}/{student_id}', 'Ustp_controller@reject')->name('reject');
Route::get('/student_data_code/', 'Ustp_controller@student_data_code')->name('student_data_code');
