<?php

namespace Database\Factories;

use App\Models\Category;
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
            'name'        => $name,
            'slug'        => $slug,
            'category_id' => Category::class,
            'status'      => array_rand([0,1]),
        ];
    }
}
