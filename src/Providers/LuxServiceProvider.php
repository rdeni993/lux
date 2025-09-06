<?php

namespace Rdeni\Lux\Providers;

use Illuminate\Support\ServiceProvider;

class LuxServiceProvider extends ServiceProvider
{
    /**
     * @var array
     */
    protected array $providers = [
        LuxConfigProvider::class, // Load configuration file
        LuxMigrationsProvider::class, // Load migrations file
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