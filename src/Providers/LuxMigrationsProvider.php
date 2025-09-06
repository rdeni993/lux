<?php

namespace Rdeni\Lux\Providers;

use Illuminate\Support\ServiceProvider;

class LuxMigrationsProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function register() : void
    {
        $this->loadMigrationsFrom(
            __DIR__ . "/../../database/migrations/"
        );
    }
}