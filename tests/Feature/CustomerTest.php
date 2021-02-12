<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CustomersController;
use App\Http\Requests\BrandRequest;
use App\Http\Requests\CustomersRequest;
use App\Models\Category;
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

getJson("api/customers/")->assertOk();

test('store user using a form request', function () {
    $this->assertActionUsesFormRequest(
        CustomersController::class,
        'store',
        CustomersRequest::class
    );
});

test('store Customer', function (){

    $customer = User::factory()->raw();

    postJson('api/customers', $customer)->assertStatus(200);

    $this->assertDatabaseHas('users', array_slice($customer, 0, 2));

});

test('get Customer', function () {

    $customer = User::factory()->create();

    getJson("api/customers/{$customer->id}")->assertOk();
});

test('update user using a form request', function () {
    $this->assertActionUsesFormRequest(
        CustomersController::class,
        'update',
        CustomersRequest::class
    );
});

test('update Customer', function () {

    $customer = User::factory()->create();

    $customer_brand = User::factory()->raw();

    putJson("api/customers/{$customer->id}", $customer_brand)->assertStatus(200);

    $this->assertDatabaseHas('users', array_slice($customer_brand, 0, 2));
});

test('delete Customer', function () {

    $customer = User::factory()->create();

    deleteJson('api/customers/' . $customer->id)->assertStatus(200);

    $this->assertDeleted($customer);
});
