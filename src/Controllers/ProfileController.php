<?php

namespace Rdeni\Lux\Controllers;

use Illuminate\Contracts\View\View;
use Rdeni\Lux\Models\User;
use Rdeni\Lux\Services\GetUserProfileDataService;

class ProfileController
{
    /**
     * @param User|bool
     * @param GetUserProfileDataService
     *
     * @return View
     */
    public function index(?User $user = null, GetUserProfileDataService $service) : View
    {
        // Prepare service
        $service->prepare($user);

        // Get user profile data
        $response = $service->getUserProfileData();

        if($response->getSuccessStatus() && ($response->getData() instanceof User)) {
            return view('welcome', [
                'user' => $response->getData()
            ]);
        }

        abort(404);
    }
}