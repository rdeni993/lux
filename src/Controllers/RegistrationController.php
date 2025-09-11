<?php

namespace Rdeni\Lux\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Rdeni\Lux\Data\Users\UserDTO;
use Rdeni\Lux\Models\User;
use Rdeni\Lux\Requests\Users\StoreUserRequest;
use Rdeni\Lux\Response\WebResponse;
use Rdeni\Lux\Services\StoreUserService;

class RegistrationController extends Controller
{
    /**
     * @return View
     */
    public function index() : View
    {
        return view("welcome");
    }

    /**
     * @param StoreUserRequest
     * @param StoreUserService
     *
     * @return RedirectResponse
     */
    public function action(StoreUserRequest $request, StoreUserService $service) : RedirectResponse
    {
        // Prepare User data from validated
        // request
        $userData = UserDTO::from($request->validated());

        // Prepare service
        $service->prepare($userData);

        // Store User
        $response = $service->store();

        if($response->getSuccessStatus() && ($response->getData() instanceof User)) {
            // User is now registered and saved to database
            // Now, lets log user in and then go to his, or her
            // profile
            Auth::login($response->getData());

            return WebResponse::success(
                redirectTo: route('profile')
            );
        }

        return WebResponse::failed();
    }
}