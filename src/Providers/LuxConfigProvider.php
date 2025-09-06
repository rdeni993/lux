<?php

namespace Rdeni\Lux\Providers;

use Illuminate\Support\ServiceProvider;

class LuxConfigProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function register() : void
    {
        // Load Global settings from file
        $this->mergeConfigFrom(
            __DIR__ . "/../../config/global.php",
            'lux.global'
        );
    }
}