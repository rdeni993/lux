<?php

use Illuminate\Support\Facades\Route;
use Rdeni\Lux\Controllers\LoginController;
use Rdeni\Lux\Controllers\ProfileController;

/**
 * ===========================
 * Protected Routes
 * ===========================
 * These routes are protected by auth guard
 * but, unlike Admin there is not
 * administrator Guard
 */

    // Profile page
    // Open any version of profile
    Route::get('/profile/{user?}', [ProfileController::class , 'index'])->name('profile');