<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id'   => fake()->numberBetween(1, 20),
            'user_id'      => fake()->numberBetween(1, 5),
            'rating_value' => random_int(1, 5),
            'comment'      => fake()->text(200),
        ];
    }
}
