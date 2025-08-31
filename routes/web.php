<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Auth\LoginController;

// Ana sayfa
Route::get('/', function () {
    return redirect()->route('login');
});

// Login route’ları
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Admin panel route’ları
Route::prefix('admin')->name('admin.')->group(function () {
    // Bu route login kontrolü yapacak
    Route::get('/', function () {
        return redirect()->route('admin.courses.index');
    })->middleware('auth'); // sadece bu route auth korumalı

    // courses resource’ları
    Route::middleware('auth')->group(function () {
        Route::resource('courses', CourseController::class);
    });
});