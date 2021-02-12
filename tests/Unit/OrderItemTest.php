<?php

use App\Models\OrderItem;
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

test('orderitem belongs to order', function () {

    $order_item = OrderItem::factory()->create();

    $this->assertTrue($order_item->order->exists());
});

test('orderitem belongs to product', function () {

    $order_item = OrderItem::factory()->create();

    $this->assertTrue($order_item->product->exists());
});
