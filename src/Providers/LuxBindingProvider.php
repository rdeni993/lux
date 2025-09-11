<?php

namespace Rdeni\Lux\Providers;

use Illuminate\Support\ServiceProvider;
use Rdeni\Lux\Contracts\Users\StoreUserInterface;
use Rdeni\Lux\Services\StoreUserService;
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
    }
}