<?php

namespace Rdeni\Lux\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Rdeni\Lux\Data\Response\ResponseDTO;
use Throwable;

class LogoutUserService
{
    /**
     * @return ResponseDTO
     */
    public function logout() : ResponseDTO
    {
        try {
            // Logout user
            Auth::logout();
            // Session regenreate
            Session::regenerate();

            return new ResponseDTO(true);
        }
        catch(Throwable $e) {
            return new ResponseDTO();
        }
    }
}