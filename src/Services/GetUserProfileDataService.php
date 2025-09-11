<?php

namespace Rdeni\Lux\Services;

use Illuminate\Support\Facades\Log;
use Rdeni\Lux\Contracts\Users\GetUserProfileDataInterface;
use Rdeni\Lux\Data\Response\ResponseDTO;
use Rdeni\Lux\Models\User;
use Rdeni\Lux\Strategies\Users\GetUserProfileDataFromRoute;
use Rdeni\Lux\Strategies\Users\GetUserProfileDataFromSession;
use Throwable;

class GetUserProfileDataService
{
    /**
     * @var User
     */
    protected User $user;

    /**
     * @var GetUserProfileDataInterface
     */
    protected GetUserProfileDataInterface $getUserProfileDataInterface;

    /**
     * @param User
     *
     * @return void
     */
    public function prepare(?User $user = null) : void
    {
        // Save user data
        // if exists in local property
        $this->user = $user;

        // Choose valid methd
        $this->chooseValidMethod();
    }

    /**
     * @return ResponseDTO
     */
    public function getUserProfileData() : ResponseDTO
    {
        try {
            // Get user profile data
            $userProfileData = $this->getUserProfileDataInterface->getUserProfileData();

            // return DTO
            return new ResponseDTO(
                true,
                $userProfileData
            );
        } catch (Throwable $e) {
            // Write log file
            Log::error("User profile data is empty.", [
                'error' => $e::class,
                'message' => $e->getMessage()
            ]);

            // Return negative response
            return new ResponseDTO();
        }
    }

    /**
     * @return void
     */
    protected function chooseValidMethod() : void
    {
        // Choose valid method
        $this->getUserProfileDataInterface =
            ($this->user && $this->user->exists) ?
                new GetUserProfileDataFromRoute($this->user) :
                new GetUserProfileDataFromSession;
    }
}