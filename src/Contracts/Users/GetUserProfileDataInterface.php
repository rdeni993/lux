<?php

namespace Rdeni\Lux\Contracts\Users;

use Rdeni\Lux\Models\User;

interface GetUserProfileDataInterface
{
    /**
     * @return User
     */
    public function getUserProfileData() : User;
}