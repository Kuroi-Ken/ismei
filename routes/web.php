<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminContentController;

Route::get('/', function () {
    return view('home');
});

Route::get('/information', function () {
    return view('information', ['title' => 'Hall of Informations']);
});

Route::get('/symposium', function () {
    return view('symposium', ['title' => 'Symposium']);
});

Route::get('/about', function () {
    return view('about', ['title' => 'About Us']);
});

// Admin routes
Route::prefix('admin')->group(function () {


    Route::get('/content/home', [AdminContentController::class, 'editHome'])
        ->name('admin.content.home');

    Route::put('/content/home', [AdminContentController::class, 'updateHome'])
        ->name('admin.content.home.update');

    Route::post('/content/whats-new', [AdminContentController::class, 'uploadWhatsNew'])
        ->name('admin.content.whats-new.upload');

    Route::delete('/content/whats-new/{image}', [AdminContentController::class, 'deleteWhatsNew'])
        ->name('admin.content.whats-new.delete');

});