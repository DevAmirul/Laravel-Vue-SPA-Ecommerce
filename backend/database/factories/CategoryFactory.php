<?php

namespace Database\Factories;

use App\Models\Section;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array{
        $name = fake()->name();
        $slug = Str::slug($name);
        return [
            'name'       => $name,
            'image'      => 'category.png',
            'slug'       => $slug,
            'section_id' => Section::class,
            'status'     => array_rand([0, 1]),
        ];
    }
}
