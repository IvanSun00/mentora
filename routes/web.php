<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/signup', function () {
    return view('register/signup');
});

Route::get('/signup/mentor', function () {
    return view('register/signupMentor');
});

Route::get('/login', function () {
    return view('register/login');
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
