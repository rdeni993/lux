<?php

namespace Rdeni\Lux\Contracts\Users;

use Rdeni\Lux\Data\Users\UserDTO;
use Rdeni\Lux\Models\User;

interface StoreUserInterface
{
    /**
     * @param UserDTO
     */
    public function store(UserDTO $userData) : User;
}