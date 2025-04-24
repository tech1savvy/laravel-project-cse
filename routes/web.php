<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
});

Route::get('/about', function () {
    return view('pages.about');
});

Route::get('/contact', function () {
    return view('pages.contact');
});

Route::get('/blog', function () {
    return view('pages.blog');
});

// Route::get('/services', function () {
//     return view('pages.service');
// });

Route::get('/projects', function () {
    return view('pages.project');
});

Route::get('/team', function () {
    return view('pages.team');
});

Route::get('/testimonials', function () {
    return view('pages.testimonial');
});

Route::get('/404', function () {
    return view('pages.404');
});


// Admin Login

use App\Http\Controllers\Admin\AdminAuthController;

Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'getLogin'])->name('adminLogin');
    Route::post('/login', [AdminAuthController::class, 'postLogin'])->name('adminLoginPost');
    Route::middleware('adminauth')->group(function () {
        Route::get('/', function () {
            return view('admin.dashboard');
        })->name('adminDashboard');
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('adminLogout');
    });
});


// Services

// Public-facing services page
use App\Http\Controllers\ServiceController;

Route::get('/services', [ServiceController::class, 'index'])->name('services.index');


// Admin CRUD
Route::middleware(['auth', 'adminauth'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('services', App\Http\Controllers\Admin\ServiceController::class);
});

