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

