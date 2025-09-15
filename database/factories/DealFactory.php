<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Employee;
use App\Models\Status;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class DealFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $random_date = fake()->dateTimeBetween('now', '+1 years');
        return [
            'client_id' => Client::factory(),
            'status_id' => Status::inRandomOrder()->first()?->id,
            'responsible_employee_id' => Employee::inRandomOrder()->first()?->id,
            'title' => fake()->sentence(3),
            'amount' =>  rand(10, 1000) + 0.99,
            'expected_close_date' => $random_date,
            'closed_at' => $random_date,
            'notes' => fake()->text(255),
        ];
    }
}
