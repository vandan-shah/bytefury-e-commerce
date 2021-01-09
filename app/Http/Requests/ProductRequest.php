<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class ProductRequest extends FormRequest
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
                "required",
            ],
            'description' => [
                "required",
            ],
            'price' => [
                "required",
            ],
            'url' => [
                "required",
            ],
            'category_id' => [
                "required"
            ]
        ];
        if ($this->getMethod() == 'PUT') {
            $rules['name'] = 'nullable';
            $rules['description'] = 'nullable';
            $rules['price'] = 'nullable';
            $rules['url'] = 'nullable';
            $rules['category_id'] = 'nullable';
        }
        return $rules;
    }
}
