<?php

use Illuminate\Support\Facades\Route;

// Public Controllers
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProjectController;

// Admin Controllers
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Admin\AdminAuthController;

// Public Routes
Route::get('/', function () { return view('pages.home'); });
Route::get('/about', function () { return view('pages.about'); });
Route::get('/contact', function () { return view('pages.contact'); });
Route::get('/team', function () { return view('pages.team'); });
Route::get('/testimonials', function () { return view('pages.testimonial'); });
Route::get('/404', function () { return view('pages.404'); });

// Dynamic Public Routes
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    // Public routes for admin login
    Route::get('/login', [AdminAuthController::class, 'getLogin'])->name('adminLogin');
    Route::post('/login', [AdminAuthController::class, 'postLogin'])->name('adminLoginPost');

    // Protected Routes
    Route::middleware('adminauth')->group(function () {
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('adminLogout');
        
        // Updated Admin dashboard route name
        Route::get('/dashboard', [AdminAuthController::class, 'dashboard'])->name('dashboard');

        // CRUD Resources
        Route::resource('services', AdminServiceController::class)->except(['show']);
        Route::resource('projects', AdminProjectController::class)->except(['show']);
    });
});
