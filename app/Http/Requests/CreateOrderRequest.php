<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrderRequest extends FormRequest

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
            'user_id' => 'string|exists:App\Models\User,id',
            'products' => 'array',
        ];
    }
    public function bodyParameters()
    {
        return [
            'user_id' => [
                'description' => 'User id',
                'example' => '384b0e3a-ce7f-4caf-8512-97cf1dcd0a11',
            ],
            'products' => [
                'description' => 'Products',
            ],
        ];
    }
}
