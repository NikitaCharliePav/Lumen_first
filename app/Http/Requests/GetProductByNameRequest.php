<?php

namespace App\Http\Requests;

use \Illuminate\Foundation\Http\FormRequest;

class GetProductByNameRequest extends FormRequest
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
            'name' => 'required|string'
        ];
    }

    public function queryParameters()
    {
        return [
            'name' => [
                'description' => 'name of Product',
                'example' => 'Bershka sweater blue',
            ],
        ];
    }
}
