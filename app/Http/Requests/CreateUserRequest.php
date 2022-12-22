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
            'login' => 'string|required|unique:users,login',
            'email' => 'email|unique:users,email',
            'name' => 'string|required',
            'birthday_at' => 'date|date_format:d.m.Y|after:01.01.1950|before:01.01.2022',
            'gender' => 'string|in:male,female',
            'password' => 'regex:/[a-z0-9!"№;%:?*_-]/i|string|min:6',
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
            ],
            'birthday_at' => [
                'description'=> 'birthday date',
                'example' => '1994-12-20'
            ],
            'gender' => [
                'description'=> 'gender',
                'example' => 'male'
            ],
            'password' => [
                'description'=> 'user password',
                'example' => 'gdf45egdGFSD'
            ],

        ];
    }
}
