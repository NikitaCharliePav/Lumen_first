<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest

{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'login' => 'string|required',
            'email' => 'email|unique:users,email',
            'name' => 'string|required'
        ];
    }
    public function bodyParameters()
    {
        return [
            'login' => [
                'description' => 'user login',
                'example' => 'charlie_1488228'
            ],
            'email' => [
                'description' => 'user email',
                'example' => 'charlie1488@mail.ru'
            ],
            'name' => [
                'description' => 'user name',
                'example' => 'Charlie'
            ]
        ];
    }
}
