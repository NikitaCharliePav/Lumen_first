<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaginationRequest extends FormRequest
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
            'page' => 'required|integer',
            'limit' => 'integer'
        ];
    }

    public function queryParameters()
    {
        return [
            'page' => [
                'description' => 'Page',
                'example' => '1',
            ],
            'limit' => [
                'description' => 'Limit.',
                'example' => '5',
            ],
        ];
    }
}
