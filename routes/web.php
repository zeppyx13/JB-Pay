<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
route::get('/login', function () {
    return view('Login');
});
Route::get('/register', function () {
    return view('Register');
});
