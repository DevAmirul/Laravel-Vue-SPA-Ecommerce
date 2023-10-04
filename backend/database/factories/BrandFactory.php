<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Brand>
 */
class BrandFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->company();
        $slug = Str::slug($name);
        return [
            'name'       => $name,
            'image'      => 'brand.jpg',
            'slug'       => $slug,
            'status'      => array_rand([0, 1]),
        ];
    }
}
