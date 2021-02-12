<?php
use App\Http\Controllers\CategoriesController;
use App\Http\Requests\BrandRequest;
use App\Http\Requests\CategoryRequest;
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

getJson("api/categories/")->assertOk();

test('store user using a form request', function () {
    $this->assertActionUsesFormRequest(
        CategoriesController::class,
        'store',
        CategoryRequest::class
    );
});

test('store Category', function (){

    $category = Category::factory()->raw();

    postJson('api/categories', $category)->assertStatus(200);

    $this->assertDatabaseHas('categories', array_slice($category, 0, 2));

});

test('get Category', function (){

    $category = Category::factory()->create();

    getJson("api/categories/{$category->id}")->assertOk();
});

test('update user using a form request', function () {
    $this->assertActionUsesFormRequest(
        CategoriesController::class,
        'update',
        CategoryRequest::class
    );
});

test('update Category', function () {

    $category = Category::factory()->create();

    $category_brand = Category::factory()->raw();

    putJson("api/categories/{$category->id}", $category_brand)->assertStatus(200);

    $this->assertDatabaseHas('categories', array_slice($category_brand, 0, 1));
});

test('delete Category', function () {

    $category = Category::factory()->create();

    deleteJson('api/categories/' . $category->id)->assertStatus(200);

    $this->assertDeleted($category);
});
