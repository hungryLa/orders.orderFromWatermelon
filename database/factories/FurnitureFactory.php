<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Furniture>
 */
class FurnitureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_id' => Order::where('type',1)->get()->random()->id,
            'description' => $this->faker->text(20),
            'measurements' => $this->faker->boolean,
            'visualization' => $this->faker->boolean,
            'getting_started' => $this->faker->boolean,
            'cutting_order' => $this->faker->boolean,
            'assembling' => $this->faker->boolean,
            'delivery_installation' => $this->faker->boolean,
            'note' => $this->faker->text(20),
        ];
    }
}
