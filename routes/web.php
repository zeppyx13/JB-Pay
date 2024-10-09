<?php

use App\Http\Controllers\Login;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Models\Register;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('Dashboard.index');
});
// auth
Route::get('/', [LoginController::class, 'index']);
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);
Route::post('/login', [LoginController::class, 'auth']);
