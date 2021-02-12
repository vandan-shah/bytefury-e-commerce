<?php

use App\Http\Requests\CategoryRequest;

test('category request validation rules',function(){
    $request = new CategoryRequest;

    $this->assertEquals([
            'name' => [
                "required"
            ],
            'description' => [
                "required"
            ]
    ],
    $request->rules()
    );
});

test('category request authorize', function () {

    $request = new CategoryRequest;

    $this->assertTrue($request->authorize());
});

