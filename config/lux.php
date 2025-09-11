<?php

/**
 * =====================
 * Lux global settings
 * =====================
 * All important settings for our package
 * are stored here.
 */

return [

/**
 * ======================
 * Test user
 * ======================
 * Create user with administrator
 * privilegies
 */
    'test_admin' => [
        'name' => "Admin",
        'email' => "admin@admin.local",
        'password' => 'localhost1234'
    ],

/**
 * ======================
 * Redirect Authenticated Users
 * ======================
 * Some pages are unavailable to logged users
 * (like 'register', 'login') so we should redirect
 * users to another page.
 */
    'redirectAuthenticatedUsersToRoute' => '/profile',
];