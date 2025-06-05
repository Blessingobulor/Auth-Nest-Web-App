<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

// Register routes
Route::get('register', [RegisterController::class, 'show'])->name('register.form');

Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');

// login route
Route::get('login', [LoginController::class, 'show'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

// dashboard route
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

// logout routes
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
