<?php

use App\Http\Requests\ProductRequest;

test('product request validation rules',function(){
    $request = new ProductRequest;

    $this->assertEquals(
        [
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
        ],
        $request->rules()
    );

});

test('product request authorize', function () {

    $request = new ProductRequest;

    $this->assertTrue($request->authorize());
});
