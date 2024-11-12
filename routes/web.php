<?php

use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\GaugeController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\CameraController;
use Illuminate\Support\Facades\Route;

/*
|---------------------------------------------------------------------------
| Web Routes
|---------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'auth'], function () {

    // Home Route
    Route::get('/', [HomeController::class, 'home']);

    // Dashboard Route
    Route::get('dashboard', [CameraController::class, 'index'])->name('dashboard');

    // Camera Routes
    Route::get('camera', function () {
        return view('camera');
    })->name('camera');

    // Profile Routes
    Route::get('profile', function () {
        return view('profile');
    })->name('profile');

    // Sensor Routes
    Route::get('sensor', function () {
        return view('sensor');
    })->name('sensor');

    // User Management Route
    Route::get('user-management', function () {
        return view('laravel-examples/user-management');
    })->name('user-management');

    // Logout Route
    Route::get('/logout', [SessionsController::class, 'destroy']);

    // User Profile Routes
    Route::get('/user-profile', [InfoUserController::class, 'create']);
    Route::post('/user-profile', [InfoUserController::class, 'store']);
});

Route::group(['middleware' => 'guest'], function () {

    // Register Routes
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);

    // Login Routes
    Route::get('/login', [SessionsController::class, 'create']);
    Route::post('/session', [SessionsController::class, 'store']);

    // Forgot Password Routes
    Route::get('/login/forgot-password', [ResetController::class, 'create']);
    Route::post('/forgot-password', [ResetController::class, 'sendEmail']);
    Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
    Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');
});

// Static Sign-In & Sign-Up Routes
Route::get('static-sign-in', function () {
    return view('static-sign-in');
})->name('sign-in');

Route::get('static-sign-up', function () {
    return view('static-sign-up');
})->name('sign-up');

// Additional Routes
Route::get('/login', function () {
    return view('session/login-session');
})->name('login');

// Gauge Routes
Route::get('/dashboard', [GaugeController::class, 'index'])->name('dashboard');
Route::get('/sensor', [GaugeController::class, 'sensorPage'])->name('sensor.page');

// Data Routes
Route::get('/get-data', [DataController::class, 'getData']);
Route::post('/update-data', [DataController::class, 'updateData']);

// Camera Routes for CRUD Operations
Route::get('/cameras', [CameraController::class, 'index']);
Route::post('/cameras', [CameraController::class, 'store']);
Route::put('/cameras/{camera}', [CameraController::class, 'update']);

