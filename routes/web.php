<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Student\StudentConrtoller;
use App\Http\Controllers\University\UniversityConrtoller;

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
/* frontend Route */
Route::get('/', [App\Http\Controllers\Frontend\HomeController::class, 'index'])->name('index');


/* Prefix admin url to login  */
Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Auth::routes();
    Route::post('/login', [LoginController::class, 'login'])->name('login.post');
});

/* if use "/admin" url auto redirect to /admin/login*/
Route::get('admin', function(){
    return redirect()->route('login');
});

/* Dashboard open after login user / admin */
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('users', [AdminController::class, 'getAllUsers'])->name('users');
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');

});

Route::group(['prefix' => '/'], function () {
    Route::resource('student', StudentConrtoller::class);
});

Route::group(['prifix' => '/'], function () {
    Route::resource('university', UniversityConrtoller::class);
});

