<?php

namespace Rdeni\Lux\Strategies\Users;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Auth;
use Rdeni\Lux\Contracts\Users\GetUserProfileDataInterface;
use Rdeni\Lux\Models\User;

class GetUserProfileDataFromSession implements GetUserProfileDataInterface
{
    /**
     * @return User
     */
    public function getUserProfileData(): User
    {
        if(! Auth::check()) {
            throw new AuthenticationException();
        }

        return Auth::user();
    }
}