<?php

namespace Rdeni\Lux\Services;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Log;
use Rdeni\Lux\Contracts\Posts\StorePostInterface;
use Rdeni\Lux\Data\Posts\PostDTO;
use Rdeni\Lux\Data\Response\ResponseDTO;
use Rdeni\Lux\Events\Posts\PostStoredEvent;
use Rdeni\Lux\Models\Post;
use Throwable;

class StorePostService
{
    /**
     * @var PostDTO
     */
    protected PostDTO $postData;

    /**
     * @var StorePostInterface
     */
    protected StorePostInterface $storePostMethod;

    /**
     * @param StorePostInterface
     */
    public function __construct(StorePostInterface $storePostMethod)
    {
        $this->storePostMethod = $storePostMethod;
    }

    /**
     * @param PostDTO
     *
     * @return void
     */
    public function prepare(PostDTO $postData) : void
    {
        $this->postData = $postData;
    }

    /**
     * @return ResponseDTO
     */
    public function store() : ResponseDTO
    {
        if( Auth::user()->cannot('create', Post::class) ) {
            throw new AuthorizationException();
        }

        try {

            $newPost = $this->storePostMethod->store(
                $this->postData
            );

            // Dispatch Event
            Event::dispatch(new PostStoredEvent($newPost));

            return new ResponseDTO(true, $newPost);

        } catch(Throwable $e) {

            // Write log
            Log::error("Post not stored in database", [
                'error' => $e::class,
                'message' => $e->getMessage()
            ]);

            return new ResponseDTO();

        }
    }
}