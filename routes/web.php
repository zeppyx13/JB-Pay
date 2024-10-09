<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

Route::get('/dashboard', function () {
    return view('Dashboard.index');
});
Route::get('/admin', [AdminController::class, 'index']);
// auth
Route::get('/', [LoginController::class, 'index']);
Route::delete('/logout', [LoginController::class, 'destroy']);
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);
Route::post('/login', [LoginController::class, 'auth']);
