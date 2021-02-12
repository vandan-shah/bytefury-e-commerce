<?php

use App\Http\Controllers\OrdersController;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;
use Laravel\Sanctum\Sanctum;
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

getJson("api/orders/")->assertOk();

test('store user using a form request', function () {
    $this->assertActionUsesFormRequest(
        OrdersController::class,
        'store',
        OrderRequest::class
    );
});

test('store Order', function () {

    $order = Order::factory()->raw();
    $order['order_items'] = OrderItem::factory()
        ->count(4)
        ->raw();

    postJson('api/orders', $order)->assertOk();

    $this->assertDatabaseHas('orders', array_slice($order, 0, 2));

});

test('get Order', function () {

    $order = Order::factory()->create();

    getJson("api/orders/{$order->id}")->assertOk();
});

test('update Order', function () {

    $order = Order::factory()->create();
    $order['order_items'] = OrderItem::factory()
        ->count(4)
        ->raw();

    $order_id = $order['id'];

    $new_order =Order::factory()->raw();
    $new_order['order_items'] = OrderItem::factory()
        ->count(4)
        ->raw();

    putJson("api/orders/{$order_id}", $new_order)->assertStatus(200);

    $this->assertDatabaseHas('orders', array_slice($new_order, 0, 2));
});

test('delete Order', function () {

    $order = Order::factory()->create();

    deleteJson('api/orders/' . $order->id)->assertStatus(200);

    $this->assertDeleted($order);
});

