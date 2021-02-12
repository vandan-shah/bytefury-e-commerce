<?php

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

test('category has many products', function () {

    $category = Category::factory()->hasProduct(4)->create();

    $this->assertCount(4, $category->product);

    $this->assertTrue($category->product()->exists());

});
