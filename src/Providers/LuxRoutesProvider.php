<?php

namespace Rdeni\Lux\Providers;

use Illuminate\Support\ServiceProvider;

class LuxRoutesProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function register() : void
    {
        $this->loadRoutesFrom(
            __DIR__ . "/../../routes/web.php"
        );
    }
}