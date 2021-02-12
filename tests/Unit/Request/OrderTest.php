<?php

use App\Http\Requests\OrderRequest;

test('Order request validation rules',function(){

    $request = new OrderRequest;

    $this->assertEquals(
        [
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
                "nullable"
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
        ],
        $request->rules()
    );

});

test('Order request authorize', function () {

    $request = new OrderRequest;

    $this->assertTrue($request->authorize());
});
