<?php

namespace Rdeni\Lux\Models;

use App\Models\User as ModelsUser;
use Rdeni\Lux\Database\Factories\UserFactory;
use Spatie\Permission\Traits\HasRoles;

class User extends ModelsUser
{
    use HasRoles;

    /**
     * @connect User
     */
    protected static function newFactory()
    {
        return UserFactory::new();
    }
}