<?php

namespace Database\Factories;

use App\Models\Editor;
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
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'phone' => '01834513106',
            'address' => fake()->address(),
            'city' => fake()->city(),
            'state' => fake()->city(),
            'role' => 1,
            'status' => 1,
            'password' => '12Aa@!b*',
        ];
    }
}
