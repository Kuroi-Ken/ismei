<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/', function () {
    return view('home');
});
Route::get('/information', function () {
    return view('information',[
        'title' => 'Hall of Informations'
    ]);
});
Route::get('/symposium', function () {
    return view('symposium', [
        'title' => 'Symposium'
    ]);
});
Route::get('/about', function () {
    return view('about',[
        'title' => 'About Us'
    ]);
});
Route::get('/admin', function () {
    return view('admin.layout',[
        'title' => 'Admin Panel'
    ]);
});