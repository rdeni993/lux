<?php

namespace Rdeni\Lux\Providers;

use Illuminate\Support\ServiceProvider;

class LuxViewsProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function register() : void
    {
        $this->loadViewsFrom(
            __DIR__ . "/../../resources/views",
            'lux'
        );
    }
}