<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => random_int(0,1),
            'title' => $this->faker->text(20),
            'full_name' => $this->faker->text(30),
            'phone_number' => $this->faker->phoneNumber,
            'type_address' => $this->faker->randomKey(Order::TYPES_ADDRESS),
            'address' => $this->faker->address,
            'color' => $this->faker->text(20),
            'type_payment' => $this->faker->randomKey(Order::TYPES_PAYMENT),
            'deadline_delivery' => $this->faker->date,
            'price' => random_int(10000,40000),
            'delivery_price' => random_int(3000,7000),
            'deposit' => random_int(5000, 20000),
            'lifting_price' => random_int(500, 2000),
            'assembly_price' => random_int(1000, 3000),
            'rest_amount' => random_int(5000,20000),
            'contract' => $this->faker->boolean,
        ];
    }
}
