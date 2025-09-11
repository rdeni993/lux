<?php

namespace Rdeni\Lux\Providers;

use Illuminate\Auth\Middleware\RedirectIfAuthenticated;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;
use InvalidArgumentException;
use Throwable;

class LuxRedirectAuthenticatedUsersToRouteProvider extends ServiceProvider
{
    /**
     * @var string
     */
    protected string $redirectAuthenticatedUsersToRoute = '/';

    /**
     * @return void
     */
    public function register() : void
    {
        try {

            // Find route in configuration file
            if( array_key_exists('redirectAuthenticatedUsersToRoute', config('lux')) ) {
                $this->redirectAuthenticatedUsersToRoute = data_get(
                    config('lux'),
                    'redirectAuthenticatedUsersToRoute'
                );
            }

            // Check is route valid
            if( empty($this->redirectAuthenticatedUsersToRoute) ) {
                throw new InvalidArgumentException("Configuration for [redirectAuthenticatedUsersToRoute] is not defined");
            }

            RedirectIfAuthenticated::redirectUsing(fn() =>
                $this->redirectAuthenticatedUsersToRoute
            );
        } catch (Throwable $e) {
            // Write log file
            Log::error("Configuration route for redirectAuthenticatedUsersToRoute is not defined", [
                'error' => $e::class,
                'message' => $e->getMessage()
            ]);
        }
    }
}