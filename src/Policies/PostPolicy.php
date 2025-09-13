<?php

namespace Rdeni\Lux\Policies;

use Rdeni\Lux\Models\User;

class PostPolicy
{
    /**
     * @param User
     *
     * @return bool
     */
    public function create(User $user) : bool
    {
        return $user->can('create post');
    }
}