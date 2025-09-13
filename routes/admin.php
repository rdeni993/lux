<?php

use Illuminate\Support\Facades\Route;
use Rdeni\Lux\Controllers\PostController;

/**
 * ==========================
 * Admin routes
 * ==========================
 * Define routes related to the core
 * of CMS. This routes are available only
 * to administrators with role:admin
 */

Route::resource(
    'post',
    PostController::class
)
->except([
    'index',    //  Avoid this two
    'show'      //  They need to remain public
]);