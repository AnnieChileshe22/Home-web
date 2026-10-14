<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ApiSectionController;
use App\Http\Controllers\LogInController;

Route::middleware('guest')->group(function () {
    Route::get('/login', [LogInController::class, 'create'])->name('login');
    Route::post('/login', [LogInController::class, 'store'])->name('login.store');
});
Route::post('/logout', [LogInController::class, 'destroy'])->middleware('auth')->name('logout');

Route::get('/data/home/{resource}', [ApiSectionController::class, 'home'])->name('data.home');
Route::get('/data/{resource}', [ApiSectionController::class, 'index'])->name('data.index');
Route::get('/data/{resource}/{id}', [ApiSectionController::class, 'show'])->name('data.show');

Route::resource('/', IndexController::class)->only(['index']);

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

Route::get('/directorate-of-research-and-graduate-studies', function () {
    return view('directorate-of-research-and-graduate-studies');
});

Route::get('/management', function () {
    return view('management');
});

Route::get('/university-partners', function () {
    return view('university-partners');
});

Route::middleware('auth')->group(function () {
Route::get('/admin', function () {
    return view('admin.index');
})->name('admin.index');

Route::get('/admin/{section}', function ($section) {
    abort_unless(in_array($section, ['news', 'events', 'accommodation', 'programmes', 'study', 'announcements'], true), 404);
    return view('admin.index', ['currentSection' => $section]);
})->name('admin.section');
});

Route::get('/programmes', [ProgramController::class, 'index']);

Route::get('/programmes/computer-science', function () {
    return view('programs.computer-science');
});

Route::get('/accommodation', function () {
    return view('accommodation.index');
});

Route::get('/accommodation/{hostel}', function ($hostel) {
    return view('accommodation.show', ['hostel' => $hostel]);
});


Route::resource('schools', SchoolController::class);
Route::resource('programs', ProgramController::class);
Route::resource('departments', DepartmentController::class)->only(['show']);
