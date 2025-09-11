<?php

use Illuminate\Support\Facades\Route;
use Rdeni\Lux\Controllers\LoginController;
use Rdeni\Lux\Controllers\RegistrationController;

/**
 * ==============================
 * Auth routes
 * ==============================
 * Define set of routes related to pages
 * important for authentication proces like
 * register, login, ...
 */

// Login form
Route::get('/login', [
    LoginController::class,
    'index'
])->name('login');

// Signup form
Route::get('/register', [
    RegistrationController::class,
    'index'
])->name('register');

Route::middleware(['throttle:3,1'])
->group(function() {

    // Login process
    Route::post('/login', [
        LoginController::class,
        'action'
    ])->name('login.action');

    // Register process
    Route::post('/register', [
        RegistrationController::class,
        'action'
    ])->name('register.action');
});
