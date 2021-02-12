<?php

use App\Models\Brand;
use App\Models\Category;
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

test('Brand has many products', function () {

    $brand = Brand::factory()->hasProducts(4)->create();

    $this->assertCount(4, $brand->products);

    $this->assertTrue($brand->products()->exists());
});
