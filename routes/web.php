<?php

use App\Http\Controllers\Login;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', function () {
    return view('Dashboard.index');
});
Route::get('/login', [LoginController::class, 'index']);
Route::get('/register', function () {
    return view('Register');
});
