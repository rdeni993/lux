<?php

namespace Rdeni\Lux\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider;
use Rdeni\Lux\Events\Posts\PostStoredEvent;
use Rdeni\Lux\Events\Users\UserStoredEvent;
use Rdeni\Lux\Listeners\AddDefaultPostStatusListener;
use Rdeni\Lux\Listeners\AddRoleToCreatedUserListener;

class LuxEventsProvider extends EventServiceProvider
{
    /**
     * @var array
     */
    protected $listen = [
        UserStoredEvent::class => [
            AddRoleToCreatedUserListener::class, // Set user role to created user
        ],
        PostStoredEvent::class => [
            AddDefaultPostStatusListener::class, // Set default post status
        ]
    ];

    /**
     * @return void
     */
    public function boot() : void
    {
        parent::boot();
    }
}