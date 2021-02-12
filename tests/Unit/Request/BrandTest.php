<?php

use App\Http\Requests\BrandRequest;


test('brands request validation rules', function () {
    $request = new BrandRequest;

    $this->assertEquals([
                'name' => [
                    'required'
                ]
            ],
        $request->rules()
    );
});

test('brand request authorize',function(){

    $request = new BrandRequest;

    $this->assertTrue($request->authorize());

});
