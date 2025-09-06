<?php

namespace Rdeni\Lux\Providers;

use Illuminate\Support\ServiceProvider;
use Rdeni\Lux\Models\User;

class LuxOverrideUserModelProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function register() : void
    {
        config([
            'auth.providers.users.model' => User::class
        ]);
    }
}