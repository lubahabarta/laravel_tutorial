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
            'user_id' => fake()->numberBetween(1, 2),
            'name' => fake()->text(5),
            'description' => fake()->sentences(6, true),
            'price' => fake()->numberBetween(100, 1000000000),
            'count' => fake()->numberBetween(1, 1000),
            'slug' => fake()->slug(),
        ];
    }
}
