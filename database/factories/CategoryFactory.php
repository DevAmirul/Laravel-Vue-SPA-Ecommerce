<?php

namespace Database\Factories;

use App\Models\Editor;
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
            'slug'       => $slug,
            'section_id' => fake()->numberBetween(1,4),
            'created_by' => fake()->numberBetween(1,4),
            // 'section_id' =>
            // 'created_by' => Editor::factory()

            // 'updated_by' => 1,

        ];
    }
}
