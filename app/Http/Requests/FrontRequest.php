<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FrontRequest extends FormRequest
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
            'name' => [
                "nullable"
            ],
            'email' => [
                "nullable",
                'email',
            ],
            'gender' => [
                "nullable"
            ],
            'address' => [
                "nullable"
            ],
            'number' => [
                "required",
                'numeric',
                'digits:10',
            ],
            'password' => [
                "required",
                "min:6",
            ]
        ];
    }
}
