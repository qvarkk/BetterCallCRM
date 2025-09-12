<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->sentence(2),
            'sku' => fake()->creditCardNumber(),
            'price' => rand(10, 1000) + 0.99,
            'description' => fake()->realText(128),
            'is_active' => fake()->boolean(90),
        ];
    }
}
