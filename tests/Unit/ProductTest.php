<?php

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;
use Laravel\Sanctum\Sanctum;

beforeEach(function () {
    Artisan::call('db:seed', ['--class' => 'DatabaseSeeder', '--force' => true]);
    $user = User::where('role', 'admin')->first();
    Sanctum::actingAs(
        $user,
        ['*']
    );
});

test('product belongs to category', function () {
    $product = Product::factory()->create();

    $this->assertTrue($product->category->exists());
});

test('product belongs to brand', function () {
    $product = Product::factory()->create();

    $this->assertTrue($product->brand->exists());
});
