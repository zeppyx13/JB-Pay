<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

// User Route
Route::middleware(['auth', 'role:User'])->group(function () {
    Route::get('/dashboard', function () {
        return view('Dashboard.index'); // Pastikan nama view benar
    });
});

// Admin Route
Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
});

// Auth Routes
Route::delete('/logout', [LoginController::class, 'destroy']);

Route::middleware(['guestOnly'])->group(function () {
    Route::get('/', [LoginController::class, 'index'])->name('login');
    Route::get('/register', [RegisterController::class, 'index']);
    Route::post('/register', [RegisterController::class, 'store']);
    Route::post('/login', [LoginController::class, 'auth']);
});
