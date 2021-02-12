<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OrderItem::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence,
            'description' => $this->faker->sentence,
            'quantity' => $this->faker->randomDigit,
            'price'=> $this->faker->randomDigit,
            'sub_total'=> $this->faker->randomDigit,
            'total'=> $this->faker->randomDigit,
            'product_id'=>Product::factory(),
            'order_id'=>Order::factory(),
        ];
    }
}
