<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Editor;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SubCategory>
 */
class SubCategoryFactory extends Factory {
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
            'cate_id'    => fake()->numberBetween(1,6),
            'created_by' => fake()->numberBetween(1,4),
            // 'updated_by' => 1,

        ];
    }
}
