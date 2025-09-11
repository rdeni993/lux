<?php

namespace Rdeni\Lux\Strategies\Users;

use Rdeni\Lux\Contracts\Users\GetUserProfileDataInterface;
use Rdeni\Lux\Models\User;

class GetUserProfileDataFromRoute implements GetUserProfileDataInterface
{
    /**
     * @var User
     */
    protected User $user;

    /**
     * @param User
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @return User
     */
    public function getUserProfileData(): User
    {
        return $this->user;
    }
}