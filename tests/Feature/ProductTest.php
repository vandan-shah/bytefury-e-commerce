<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\ProductsController;
use App\Http\Requests\BrandRequest;
use App\Http\Requests\CustomersRequest;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;
use Laravel\Sanctum\Sanctum;
use function Pest\Faker\faker;
use function Pest\Laravel\deleteJson;
use function Pest\Laravel\getJson;
use function Pest\Laravel\postJson;
use function Pest\Laravel\putJson;

beforeEach(function () {
    Artisan::call('db:seed', ['--class' => 'DatabaseSeeder', '--force' => true]);
    $user = User::where('role', 'admin')->first();
    Sanctum::actingAs(
        $user,
        ['*']
    );
});

getJson("api/products/")->assertOk();

test('store user using a form request', function () {
    $this->assertActionUsesFormRequest(
        ProductsController::class,
        'store',
        ProductRequest::class
    );
});

test('store Product', function () {

    $product = Product::factory()->raw();

    postJson('api/products', $product)->assertOk();

    $this->assertDatabaseHas('products', array_slice($product, 0, 2));
});

test('get Product', function () {

    $product = Product::factory()->create();

    getJson("api/products/{$product->id}")->assertOk();
});

test('update user using a form request', function () {
    $this->assertActionUsesFormRequest(
        ProductsController::class,
        'update',
        ProductRequest::class
    );
});

test('update Product', function () {

    $product = Product::factory()->create();

    $new_product = Product::factory()->raw();

    putJson("api/products/{$product->id}", $new_product)->assertStatus(200);

    $this->assertDatabaseHas('products', array_slice($new_product, 0, 2));
});

test('delete Product', function () {

    $product = Product::factory()->create();

    deleteJson('api/products/' . $product->id)->assertStatus(200);

    $this->assertDeleted($product);
});
