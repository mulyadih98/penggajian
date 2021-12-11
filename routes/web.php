<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\GajiController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SlipGajiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserDashboardController;
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
    return redirect()->route('login');
});

Route::post('login', [AuthController::class, 'login'])->name('login.post');

Route::middleware('auth')->group(function() {
    Route::middleware('check_jabatan:admin')->prefix('admin')->group(function () {
        Route::get('/', [AdminController::class, 'index']);
        Route::get('/blank', function () {
            return view('admin.dashboard');
        });

        Route::get('/gajis/bayar/{userid}/{periode}', [GajiController::class, 'bayar'])->name('bayar.gaji');
        Route::get('/gajis/periode/{periode}', [GajiController::class, 'getPerpEriode'])->name('periode.gaji');
        Route::resource('/users', UserController::class);
        Route::resource('/jabatans', JabatanController::class);
        Route::resource('/gajis', GajiController::class);
    });
    
    Route::middleware('check_jabatan:user')->prefix('user')->group(function () {
        Route::get('/', [DashboardUserController::class, 'index']);
        Route::get('gajis', [DashboardUserController::class, 'gaji'])->name('data.gaji.user');
    });

    Route::put('user/{id}/reset-password/', [UserController::class, 'resetPassword'])->name('reset-password');

    Route::get('/slip/{gajiId}', SlipGajiController::class)->name('slip.gaji');
    Route::get('/data-diri', [AccountController::class, 'profile'])->name('data.diri');
    Route::put('/data-diri', [AccountController::class, 'updateProfile'])->name('update.data.diri');
    Route::prefix('akun')->group(function(){
        Route::get('/', [AccountController::class, 'account'])->name('akun');
        Route::put('ganti-password', [AccountController::class, 'updatePassword'])->name('ganti.password');
        Route::put('ganti-email', [AccountController::class, 'updateEmail'])->name('ganti.email');
    });

    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});


Route::view('login', 'Auth.login')->middleware('check_login')->name("login");