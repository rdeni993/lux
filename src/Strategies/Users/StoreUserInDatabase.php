<?php

namespace Rdeni\Lux\Strategies\Users;

use Rdeni\Lux\Contracts\Users\StoreUserInterface;
use Rdeni\Lux\Data\Users\UserDTO;
use Rdeni\Lux\Models\User;

class StoreUserInDatabase implements StoreUserInterface
{
    /**
     * @param UserDTO
     *
     * @return User
     */
    public function store(UserDTO $userData): User
    {
        return User::create(
            $userData->toArray()
        );
    }
}