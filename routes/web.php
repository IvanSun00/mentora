<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

/**
 * Routes for authentication
 */
Route::controller(AuthController::class)->group(function () {
    Route::get('/register', 'showRegister')->name('register');
    Route::get('/register/mentor', 'showRegisterMentor')->name('regiter.mentor');
    Route::get('/login', 'showLogin')->name('login');

    Route::post('/register', 'register')->name('register');
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
