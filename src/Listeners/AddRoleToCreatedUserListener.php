<?php

namespace Rdeni\Lux\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use InvalidArgumentException;
use Rdeni\Lux\Events\Users\UserStoredEvent;

class AddRoleToCreatedUserListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserStoredEvent $event): void
    {
        // Get User From Event
        $user = $event->getUser();

        if(! $user->exists) {
            throw new InvalidArgumentException("Unable to add role to user. User doesn't exists in database");
        }

        // Add user role
        $user->assignRole('user');
    }
}
