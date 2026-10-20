<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ApiSectionController;
use App\Http\Controllers\LogInController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\AnnouncementsController;
use App\Http\Controllers\HostelsController;

Route::middleware('guest')->group(function () {
    Route::get('/login', [LogInController::class, 'create'])->name('login');
    Route::post('/login', [LogInController::class, 'store'])->name('login.store');
});
Route::post('/logout', [LogInController::class, 'destroy'])->middleware('auth')->name('logout');

Route::get('/data/home/{resource}', [ApiSectionController::class, 'home'])->name('data.home');
Route::get('/data/{resource}', [ApiSectionController::class, 'index'])->name('data.index');
Route::get('/data/{resource}/{id}', [ApiSectionController::class, 'show'])->name('data.show');

Route::get('/posts', [PostsController::class, 'publicIndex'])->name('posts.index');
Route::get('/news-events', [PostsController::class, 'newsEvents'])->name('news-events');
Route::get('/posts/{post}', [PostsController::class, 'publicShow'])->name('posts.show');
Route::get('/announcements', [AnnouncementsController::class, 'publicIndex'])->name('announcements.index');
Route::get('/announcements/{announcement}', [AnnouncementsController::class, 'publicShow'])->name('announcements.show');

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

Route::get('/maps-and-directions', function () {
    return view('maps-and-directions');
})->name('maps-and-directions');

Route::view('/about', 'about')->name('about');

Route::get('/jobs-and-careers', function () {
    return view('jobs-and-careers');
})->name('jobs-and-careers');

Route::get('/library', function () {
    return view('library');
})->name('library');

Route::get('/cict', function () {
    return view('cict');
})->name('cict');

Route::middleware('auth')->group(function () {
Route::resource('admin/announcements', AnnouncementsController::class)->names('admin.announcements')->except(['show']);
Route::resource('admin/hostels', HostelsController::class)->names('admin.hostels');
Route::resource('admin/posts', PostsController::class)->names('admin.posts')->except(['index', 'show']);
Route::get('/admin/posts', [PostsController::class, 'index'])->name('admin.posts.index');
Route::get('/admin/posts/{post}', [PostsController::class, 'show'])->name('admin.posts.show');

Route::get('/admin', function () {
    return view('admin.index');
})->name('admin.index');

Route::get('/admin/{section}', function ($section) {
    abort_unless(in_array($section, ['news', 'events', 'hostels', 'calendar', 'programmes', 'study', 'announcements'], true), 404);
    return view('admin.index', ['currentSection' => $section]);
})->name('admin.section');
});

Route::get('/programmes', [ProgramController::class, 'index']);

Route::get('/programmes/computer-science', function () {
    return view('programs.computer-science');
});

Route::get('/accommodation', [HostelsController::class, 'publicIndex'])->name('hostels.public.index');
Route::get('/accommodation/{hostel}', [HostelsController::class, 'publicShow'])->name('hostels.public.show');


Route::resource('schools', SchoolController::class);
Route::resource('programs', ProgramController::class);
Route::resource('departments', DepartmentController::class)->only(['show']);
