<?php

namespace Rdeni\Lux\Data\Users;

use Spatie\LaravelData\Data;

class UserDTO extends Data
{
    /**
     * @var string
     */
    public string $name;

    /**
     * @var string
     */
    public string $email;

    /**
     * @var string
     */
    public string $password;

    /**
     * @param string
     * @param string
     * @param string
     */
    public function __construct(
        string $name,
        string $email,
        string $password
    )
    {
        //
        $this->name = $name;
        //
        $this->email = $email;
        //
        $this->password = $password;
    }
}