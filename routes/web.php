<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/fees', function () {
    return view('fees');
});

Route::get('/requirements', function () {
    return view('requirements');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/calender', function () {
    return view('calender');
});

Route::get('/scholership', function () {
    return view('scholership');
});

Route::get('/dean-of-students', function () {
    return view('dean-of-students');
});

Route::get('/innovation-and-research', function () {
    return view('innovation-and-research');
});

Route::get('/admin', function () {
    return view('admin.index');
});

Route::get('/programmes', function () {
    return view('programs.index');
});

Route::get('/programmes/computer-science', function () {
    return view('programs.computer-science');
});

Route::get('/accommodation', function () {
    return view('accommodation.index');
});

Route::get('/accommodation/{hostel}', function ($hostel) {
    return view('accommodation.show', ['hostel' => $hostel]);
});

Route::get('/schools', function () {
    return view('schools.index');
});

Route::get('/schools/mathematics-natural-sciences', function () {
    return view('schools.mathematics-natural-sciences');
});
