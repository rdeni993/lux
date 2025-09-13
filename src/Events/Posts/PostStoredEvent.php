<?php

namespace Rdeni\Lux\Events\Posts;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Rdeni\Lux\Models\Post;

class PostStoredEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public function __construct(
        protected Post $post
    )
    {
        //
    }

    /**
     * @return Post
     */
    public function getPost() : Post
    {
        return $this->post;
    }
}
