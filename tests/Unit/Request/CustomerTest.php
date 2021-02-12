<?php

use App\Http\Requests\CustomersRequest;
use Illuminate\Validation\Rule;

test('Customer request validation rules',function(){

    $request = new CustomersRequest;

    $this->assertEquals(
        [
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
                    "required"
                ],
                'number' => [
                    'required'
                ],
                'password' => [
                    "required"
                ]
        ],
        $request->rules()
    );

});

test('Customer request authorize', function () {

    $request = new CustomersRequest;

    $this->assertTrue($request->authorize());
});

