<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminContentController;
use App\Http\Controllers\ForgotPasswordController;

// Public routes
Route::get('/', fn() => view('home'));
Route::get('/information', fn() => view('information', ['title' => 'Hall of Informations']));
Route::get('/symposium', fn() => view('symposium', ['title' => 'Symposium']));
Route::get('/about', fn() => view('about', ['title' => 'About Us']));

// Login & forgot password (hanya untuk yang belum login)
Route::middleware('guest')->group(function () {

    // Login
    Route::get('/go-to-admin-panel-menu', [AdminAuthController::class, 'showLogin'])
        ->name('admin.login');
    Route::post('/go-to-admin-panel-menu', [AdminAuthController::class, 'login'])
        ->name('admin.login.post');

    // Forgot password
    Route::get('/forgot-the-password', [ForgotPasswordController::class, 'showForm'])
        ->name('admin.forgot');
    Route::post('/forgot-the-password', [ForgotPasswordController::class, 'sendLink'])
        ->name('admin.forgot.send');

    // Reset password (dari link di email)
    Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showReset'])
        ->name('password.reset');
    Route::post('/reset-password', [ForgotPasswordController::class, 'reset'])
        ->name('admin.reset.update');

});

// Logout
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])
    ->name('admin.logout')
    ->middleware('auth');

// Admin routes — wajib login
Route::prefix('admin')->middleware('auth')->group(function () {

    Route::get('/', [AdminContentController::class, 'editHome'])
        ->name('admin.dashboard');

    Route::get('/content/home', [AdminContentController::class, 'editHome'])
        ->name('admin.content.home');

    Route::put('/content/home', [AdminContentController::class, 'updateHome'])
        ->name('admin.content.home.update');

    Route::post('/content/whats-new', [AdminContentController::class, 'uploadWhatsNew'])
        ->name('admin.content.whats-new.upload');

    Route::delete('/content/whats-new/{image}', [AdminContentController::class, 'deleteWhatsNew'])
        ->name('admin.content.whats-new.delete');

});