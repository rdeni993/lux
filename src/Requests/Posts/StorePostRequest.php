<?php

namespace Rdeni\Lux\Requests\Posts;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * @return true
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
            'title' => [
                'required'
            ],
            'body' => [
                'sometimes'
            ]
        ];
    }
}