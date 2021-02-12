<?php

use App\Models\Order;
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

test('Order has many orderItems', function () {

    $order = Order::factory()->hasorderItems(4)->create();

    $this->assertCount(4, $order->orderItems);

    $this->assertTrue($order->orderItems()->exists());
});

test('order belongs to user', function () {

    $order = Order::factory()->create();

    $this->assertTrue($order->user->exists());
});

