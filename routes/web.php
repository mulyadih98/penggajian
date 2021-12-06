<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\UserController;
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

Route::post('login', [AuthController::class, 'login'])->name('login.post');

Route::middleware('auth')->group(function() {
    Route::middleware('check_jabatan:admin')->prefix('admin')->group(function () {
        Route::get('/', function () {
            return view('admin.dashboard');
        });
        Route::get('/blank', function () {
            return view('admin.dashboard');
        });

        Route::resource('/users', UserController::class);
        Route::resource('/jabatans', JabatanController::class);
    });
    
    Route::middleware('check_jabatan:user')->prefix('user')->group(function () {
        Route::get('/', function () {
            return "welcome user";
        });
    });

    Route::put('user/{id}/reset-password/', [UserController::class, 'resetPassword'])->name('reset-password');


    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});


Route::view('login', 'Auth.login')->middleware('check_login')->name("login");