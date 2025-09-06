<?php

namespace Rdeni\Lux\Providers;

use Illuminate\Support\ServiceProvider;
use Rdeni\Lux\Console\Commands\LuxInitCommand;

class LuxCommandsProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function register() : void
    {
        $this->commands([
            LuxInitCommand::class, // Load command for package initialization
        ]);
    }
}