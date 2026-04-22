<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminContentController;
use App\Http\Controllers\AdminInformationController;
use App\Http\Controllers\AdminSpeakerController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', fn() => view('home'));
Route::get('/information',   fn() => view('information',   ['title' => 'Hall of Informations']));
Route::get('/symposium',     fn() => view('symposium',     ['title' => 'Symposium']));
Route::get('/about',         fn() => view('about',         ['title' => 'About Us']));
Route::get('/archive',       fn() => view('archive',       ['title' => 'Archives']));
Route::get('/other-archive', fn() => view('other-archive', ['title' => 'Archives']));
Route::get('/login', function () { return "Halaman Login ISMEI"; })->name('login');

Route::get('/register',  [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

// Guest-only
Route::middleware('guest')->group(function () {
    Route::get ('/go-to-admin-panel-menu', [AdminAuthController::class, 'showLogin'])->name('admin.login');
    Route::post('/go-to-admin-panel-menu', [AdminAuthController::class, 'login'])    ->name('admin.login.post');

    Route::get ('/forgot-the-password', [ForgotPasswordController::class, 'showForm'])->name('admin.forgot');
    Route::post('/forgot-the-password', [ForgotPasswordController::class, 'sendLink'])->name('admin.forgot.send');

    Route::get ('/reset-password/{token}', [ForgotPasswordController::class, 'showReset'])->name('password.reset');
    Route::post('/reset-password',         [ForgotPasswordController::class, 'reset'])    ->name('admin.reset.update');
});

// Logout
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])
    ->name('admin.logout')
    ->middleware('auth');

// Admin (auth required)
Route::prefix('admin')->middleware('auth')->group(function () {

    // Dashboard / Home Content
    Route::get('/',             [AdminContentController::class, 'editHome'])   ->name('admin.dashboard');
    Route::get('/content/home', [AdminContentController::class, 'editHome'])   ->name('admin.content.home');
    Route::put('/content/home', [AdminContentController::class, 'updateHome']) ->name('admin.content.home.update');

    // Header Logo
    Route::post('/content/header-logo', [AdminContentController::class, 'updateHeaderLogo'])
        ->name('admin.content.header-logo.update');

    // Partner Logos
    Route::post  ('/content/logos',             [AdminContentController::class, 'uploadLogo'])     ->name('admin.content.logos.upload');
    Route::patch ('/content/logos/{logo}/name', [AdminContentController::class, 'updateLogoName']) ->name('admin.content.logos.update-name');
    Route::delete('/content/logos/{logo}',      [AdminContentController::class, 'deleteLogo'])     ->name('admin.content.logos.delete');

    // What's New images
    Route::post  ('/content/whats-new',         [AdminContentController::class, 'uploadWhatsNew']) ->name('admin.content.whats-new.upload');
    Route::delete('/content/whats-new/{image}', [AdminContentController::class, 'deleteWhatsNew']) ->name('admin.content.whats-new.delete');

    // Speakers CRUD
    Route::get   ('/speakers',                [AdminSpeakerController::class, 'index'])  ->name('admin.speaker.index');
    Route::get   ('/speakers/create',         [AdminSpeakerController::class, 'create']) ->name('admin.speaker.create');
    Route::post  ('/speakers',                [AdminSpeakerController::class, 'store'])  ->name('admin.speaker.store');
    Route::get   ('/speakers/{speaker}/edit', [AdminSpeakerController::class, 'edit'])   ->name('admin.speaker.edit');
    Route::put   ('/speakers/{speaker}',      [AdminSpeakerController::class, 'update']) ->name('admin.speaker.update');
    Route::delete('/speakers/{speaker}',      [AdminSpeakerController::class, 'destroy'])->name('admin.speaker.destroy');

    // Informations CRUD
    Route::get   ('/informations',                        [AdminInformationController::class, 'index'])  ->name('admin.information.index');
    Route::get   ('/informations/create',                 [AdminInformationController::class, 'create']) ->name('admin.information.create');
    Route::post  ('/informations',                        [AdminInformationController::class, 'store'])  ->name('admin.information.store');
    Route::get   ('/informations/{information}/edit',     [AdminInformationController::class, 'edit'])   ->name('admin.information.edit');
    Route::put   ('/informations/{information}',          [AdminInformationController::class, 'update']) ->name('admin.information.update');
    Route::delete('/informations/{information}',          [AdminInformationController::class, 'destroy'])->name('admin.information.destroy');
});