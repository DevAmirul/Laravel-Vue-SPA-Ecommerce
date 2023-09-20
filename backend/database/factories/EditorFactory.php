<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Editor>
 */
class EditorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->email(),
            'phone' => '01834513' . fake()->numberBetween(100, 999),
            'address' => fake()->address(),
            'city' => fake()->city(),
            'state' => fake()->city(),
            'password' => '12Aa@!b*',
        ];
    }
}
