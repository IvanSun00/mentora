<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\ScheduleController;
use App\Http\Middleware\MentorMiddleware;
use App\Http\Middleware\StudentMiddleware;
use App\Models\Mentor;
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

/**
 * Routes for schedule
 */
Route::controller(ScheduleController::class)->prefix('schedule')->name('schedule.')->group(function () {
    Route::middleware([MentorMiddleware::class])->group(function () {
        Route::get('/', 'index')->name('');
        Route::get('/get-available-slot', 'getAvailableSlot')->name('getAvailableSlot');
        Route::post('/update-available-slot', 'updateAvailableSlot')->name('updateAvailableSlot');
    });

    Route::get('/get-available-mentor-slot', 'getAvailableMentorSlot')->name('getAvailableMentorSlot');
});

/**
 * Routes for mentor
 */
Route::controller(MentorController::class)->prefix('mentor')->name('mentor.')->group(function () {
    
    Route::get('/search', 'search')->name('search'); 
    Route::get('/searchResult', 'searchResult')->name('searchResult');  
    
    // rating
    Route::get('/detail/{mentor}', 'detailMentor')->name('detailMentor');

    //reserve
    Route::get('/reserve/{mentor}', 'reserve')->name('reserve');

    // payment
    Route::get('/payment/{mentor}', 'payment')->name('payment');
    Route::post('/payment/{mentor}', 'paymentProcess')->name('paymentProcess');
});

Route::get('/profile', function () {
    return view('/profile/profile');
});
