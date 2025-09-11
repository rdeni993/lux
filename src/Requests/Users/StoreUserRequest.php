<?php

namespace Rdeni\Lux\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * @return void
     */
    public function authorize() : bool
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules() : array
    {
        return [
            'name' => [
                'required',
            ],
            'email' => [
                'required',
                'email',
                'unique:users,email'
            ],
            'password' => [
                'required',
                'string',
                'min:8'
            ]
        ];
    }
}