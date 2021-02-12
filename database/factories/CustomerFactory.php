<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence,
            'email' => $this->faker->unique()->safeEmail,
            'gender'=>$this->faker->randomElement(['male','female']),
            'address'=>$this->faker->address,
            'number'=>$this->faker->phoneNumber,
            'password'=> $this->faker->password //password
        ];
    }
}
