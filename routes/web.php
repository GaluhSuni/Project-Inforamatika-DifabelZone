<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\Auth\ForgotPasswordController;
use App\Http\Controllers\User\Auth\ResetPasswordController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Home route
Route::get('/', function () {
    return view('welcome');
});

// View for requesting a password reset
Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->name('password.request');

// Handle the email submission for password reset
Route::post('/password/email', [ForgotPasswordController::class, 'forgotPassword'])->name('password.email');

// View for displaying the reset password form (with token)
Route::get('/password/reset-form', [ResetPasswordController::class, 'showResetForm'])->name('password.reset.form');

// Handle the actual password reset process
Route::post('/password/reset', [ResetPasswordController::class, 'resetPassword'])->name('password.reset.process');