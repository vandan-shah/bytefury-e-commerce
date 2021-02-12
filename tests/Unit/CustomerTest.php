<?php

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

test('Customer has many products', function () {

    $customer = User::factory()->hasorder(4)->create();

    $this->assertCount(4, $customer->order);

    $this->assertTrue($customer->order()->exists());
});
