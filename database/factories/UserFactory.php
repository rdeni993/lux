<?php

namespace Rdeni\Lux\Database\Factories;

use Database\Factories\UserFactory as FactoriesUserFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Rdeni\Lux\Models\User;

class UserFactory extends FactoriesUserFactory
{
    /**
     * Connect to the our model
     *
     * @var string
     */
    protected $model = User::class;
}