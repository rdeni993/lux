<?php

namespace Rdeni\Lux\Contracts\Posts;

use Rdeni\Lux\Data\Posts\PostDTO;
use Rdeni\Lux\Models\Post;

interface StorePostInterface
{
    /**
     * @param PostDTO
     * @return Post
     */
    public function store(PostDTO $postData) : Post;
}