<?php

namespace Rdeni\Lux\Listeners;

use Illuminate\Support\Facades\Log;
use InvalidArgumentException;
use Rdeni\Lux\Events\Posts\PostStoredEvent;
use Throwable;

class AddDefaultPostStatusListener
{
    public function __construct()
    {
        //
    }

    /**
     * @param PostStoredEvent
     *
     * @return void
     */
    public function handle(PostStoredEvent $event) : void
    {
        $defaultPostStatus = config('lux.defaultPostStatus');
        $post = $event->getPost();
        try {
            $post->update([
                'status' => $defaultPostStatus
            ]);
        } catch(Throwable $e) {
            // Write Log file
            Log::warning("Cannot declare default post status from the configuration options. Check for allowed options!",[
                'error' => $e::class,
                'message' => $e->getMessage()
            ]);
        }
    }
}