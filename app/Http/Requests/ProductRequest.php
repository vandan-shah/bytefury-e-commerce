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
            'brand_id' => [
                "required",
            ],
            'price' => [
                "required",
            ],
            'category_id' => [
                "required"
            ]
        ];
        if ($this->getMethod() == 'PUT') {

            $rules['name'] = 'required';
            $rules['description'] = 'required';
            $rules['price'] = 'required';
            $rules['category_id'] = 'nullable';
            $rules['brand_id'] = 'nullable';
        }
        return $rules;
    }
}
