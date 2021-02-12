<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'order_code'=> $this->faker->randomNumber,
            'order_date'=>$this->faker->date($format = 'Y-m-d', $max = 'now'),
            'sub_total'=>$this->faker->numberBetween($min = 1000, $max = 9000),
            'tax'=> $this->faker->randomDigit,
            'total'=> $this->faker->numberBetween($min = 1000, $max = 9000),
            'user_id' => User::factory(),
        ];
    }
}
