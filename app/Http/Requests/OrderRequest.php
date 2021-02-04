<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'order_code' => [
                "required"
            ],
            'order_date' => [
                "required"
            ],
            'sub_total' => [
                "nullable"
            ],
            'tax' => [
                "nullable"
            ],
            'total' => [
                "required"
            ],
            'status' => [
                "required"
            ],
            'user_id' => [
                "required"
            ],

            'order_items.*.name' => [
                "required"
            ],
            'order_items.*.description' => [
                "nullable"
            ],
            'order_items.*.quantity' => [
                "required"
            ],
            'order_items.*.price' => [
                "required"
            ],
            'order_items.*.sub_total' => [
                "nullable"
            ],
            'order_items.*.total' => [
                "required"
            ],
            'order_items.*.product_id' => [
                "required"
            ]
        ];
    }
}
