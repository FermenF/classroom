<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\StudentController;
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
    return view('home.index');
})->middleware('auth')->name('index');

Route::controller(AuthController::class)->group(function (){
    Route::get('/login', 'index')->name('login')->middleware('guest');
    Route::post('/login', 'login')->name('login.signIn');
    Route::post('/logout', 'logout')->name('logout');
});

Route::resource('students', StudentController::class)->names('students')->middleware('auth');
Route::resource('classrooms', ClassroomController::class)->names('classrooms')->middleware('auth');
