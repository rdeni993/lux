<?php

namespace Rdeni\Lux\Strategies\Posts;

use Rdeni\Lux\Contracts\Posts\StorePostInterface;
use Rdeni\Lux\Data\Posts\PostDTO;
use Rdeni\Lux\Models\Post;

class StorePostInDatabase implements StorePostInterface
{
    /**
     * @param PostDTO
     *
     * @return Post
     */
    public function store(PostDTO $postData): Post
    {
        return Post::create($postData->toArray());
    }
}