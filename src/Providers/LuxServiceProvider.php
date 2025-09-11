<?php

namespace Rdeni\Lux\Providers;

use Illuminate\Support\ServiceProvider;

class LuxServiceProvider extends ServiceProvider
{
    /**
     * @var array
     */
    protected array $providers = [
        LuxRoutesProvider::class, // Load routes
        LuxConfigProvider::class, // Load configuration file
        LuxViewsProvider::class, // Load views
        LuxMigrationsProvider::class, // Load migrations file
        LuxCommandsProvider::class, // Load commands we need
        LuxOverrideUserModelProvider::class, // Override User model with our instance,
        LuxEventsProvider::class, // Load events
        LuxBindingProvider::class, // Bind strategies
        LuxRedirectAuthenticatedUsersToRouteProvider::class, // Redirect logged users from guests pages
    ];

    /**
     * @return void
     */
    public function register() : void
    {
        foreach($this->providers as $provider) {
            $this->app->register($provider);
        }
    }
}