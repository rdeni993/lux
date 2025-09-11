<?php

namespace Rdeni\Lux\Services;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Log;
use Rdeni\Lux\Contracts\Users\StoreUserInterface;
use Rdeni\Lux\Data\Response\ResponseDTO;
use Rdeni\Lux\Data\Users\UserDTO;
use Rdeni\Lux\Events\Users\UserStoredEvent;
use Throwable;

class StoreUserService
{
    /**
     * @var UserDTO
     */
    protected UserDTO $userData;

    /**
     * @var StoreUserInterface
     */
    protected StoreUserInterface $storeUserMethod;

    /**
     * @param StoreUserInterface
     */
    public function __construct(StoreUserInterface $storeUserMethod)
    {
        $this->storeUserMethod = $storeUserMethod;
    }

    /**
     * @param UserDTO
     *
     * @return void
     */
    public function prepare(UserDTO $userData) : void
    {
        $this->userData = $userData;
    }

    public function store() : ResponseDTO
    {
        try {
            // Create New User using strategy
            $newUser = $this->storeUserMethod->store($this->userData);

            // Emit event
            Event::dispatch(new UserStoredEvent($newUser));

            // Return positive response
            return new ResponseDTO(true, $newUser);
        }
        catch(Throwable $e) {
            // Write Log if anything bad happend
            Log::error("Error occured during user storing in database", [
                'error' => $e::class,
                'message' => $e->getMessage()
            ]);

            return new ResponseDTO();
        }
    }
}