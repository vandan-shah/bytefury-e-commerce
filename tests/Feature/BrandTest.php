<?php

use App\Http\Controllers\BrandController;
use App\Http\Requests\BrandRequest;
use App\Models\Brand;
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

getJson("api/brand/")->assertOk();

test('store user using a form request', function () {
    $this->assertActionUsesFormRequest(
        BrandController::class,
        'store',
        BrandRequest::class
    );
});

test('store brand', function () {

    $brand = Brand::factory()->raw();

    postJson('api/brand', $brand)->assertStatus(200);

    $this->assertDatabaseHas('brands', array_slice($brand, 0, 1));
});

test('get brand', function () {

    $brand = Brand::factory()->create();

    getJson("api/brand/{$brand->id}")->assertOk();
});

test('update user using a form request', function () {
    $this->assertActionUsesFormRequest(
        BrandController::class,
        'update',
        BrandRequest::class
    );
});

test('update brand', function () {

    $brand = Brand::factory()->create();

    $new_brand = Brand::factory()->raw();

    putJson("api/brand/{$brand->id}", $new_brand)->assertStatus(200);

    $this->assertDatabaseHas('brands', array_slice($new_brand, 0, 1));
});

test('delete brand', function () {

    $brand = Brand::factory()->create();

    deleteJson('api/brand/' . $brand->id)->assertStatus(200);

    $this->assertDeleted($brand);
});
