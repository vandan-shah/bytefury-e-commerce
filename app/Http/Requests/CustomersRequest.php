<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CustomersRequest extends FormRequest
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
        $rules = [
            'name' => [
                "required"
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('users')
            ],
            'gender' => [
                "nullable"
            ],
            'address' => [
                "nullable"
            ],
            'number' => [
                "nullable"
            ],
            'password' => [
                "required"
            ]
        ];
        if ($this->getMethod() == 'PUT') {
            $rules['email'] = [
                'required',
                'email',
                Rule::unique('users')->ignore($this->route('customer')),
            ];
            $rules['password'] = 'nullable';
        }
        return $rules;
    }
}
