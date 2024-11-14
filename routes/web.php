<?php

use App\Http\Controllers\AuthController;
use App\Http\Middleware\StudentMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

/**
 * Routes for authentication
 */
Route::controller(AuthController::class)->group(function () {
    Route::get('/register', 'showRegister')->name('register');
    Route::get('/register/mentor', 'showRegisterMentor')->middleware([StudentMiddleware::class])->name('register.mentor');
    Route::get('/login', 'showLogin')->name('login');
    Route::get('/logout', 'logout')->name('logout');

    Route::post('/register', 'register')->name('register');
    Route::post('/register/mentor', 'registerMentor')->middleware([StudentMiddleware::class])->name('register.mentor');
    Route::post('/login', 'login')->name('login');
});

Route::get('/navbar', function () {
    return view('/navbar/navbar');
});

Route::get('/schedule', function () {
    return view('/schedule/schedule');
});

Route::get('/search', function () {
    return view('/guru/searchGuru');
});

Route::get('/detail_guru', function () {
    return view('/guru/detailGuru');
});
