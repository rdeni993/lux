<?php

use Illuminate\Support\Facades\Route;

if(! defined('AUTH_ROUTES')) {
    define('AUTH_ROUTES', __DIR__ . "/auth.php");
}

if(! defined('ADMIN_ROUTES')) {
    define('ADMIN_ROUTES', __DIR__ . "/admin.php");
}

if(! defined('PROTECTED_ROUTES')) {
    define('PROTECTED_ROUTES', __DIR__ . "/protected.php");
}

/**
 * ======================
 * Admin routes
 * ======================
 */
Route::middleware([
    'web',
    'auth',
])->group(ADMIN_ROUTES);

/**
 * ======================
 * Auth routes
 * ======================
 */
Route::middleware([
    'web',
    'guest'
])->group(AUTH_ROUTES);

/**
 * ======================
 * Protected routes
 * ======================
 */
Route::middleware([
    'web',
    'auth'
])->group(PROTECTED_ROUTES);