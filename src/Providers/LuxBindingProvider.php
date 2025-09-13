<?php

namespace Rdeni\Lux\Providers;

use Illuminate\Support\ServiceProvider;
use Rdeni\Lux\Contracts\Posts\StorePostInterface;
use Rdeni\Lux\Contracts\Users\StoreUserInterface;
use Rdeni\Lux\Services\StorePostService;
use Rdeni\Lux\Services\StoreUserService;
use Rdeni\Lux\Strategies\Posts\StorePostInDatabase;
use Rdeni\Lux\Strategies\Users\StoreUserInDatabase;

class LuxBindingProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function register() : void
    {
        // Default method to register new user
        // Method: StoreUserInDatabase
        $this->app->when(StoreUserService::class)
        ->needs(StoreUserInterface::class)
        ->give(StoreUserInDatabase::class);

        // Store Post in database default
        // behavior
        $this->app->when(StorePostService::class)
        ->needs(StorePostInterface::class)
        ->give(StorePostInDatabase::class);
    }
}