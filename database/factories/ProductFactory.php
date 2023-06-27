<?php

namespace Database\Factories;

use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array{
        $name      = fake()->name();
        $slug      = Str::slug($name);
        $imagesStr = '';
        for ($i = 0; $i < 3; $i++) {
            $imagesStr .= 'digital_' . random_int(1, 22) . '.jpg' . ',';
        }
        return [
            'title'             => $name,
            'slug'              => $slug,
            'sku'               => 'product123',
            'description'       => fake()->text(500),
            'short_description' => fake()->text(200),
            'price'             => fake()->numberBetween(200, 1000),
            'stock_status'      => fake()->numberBetween(5, 50),
            'qty_in_stock'      => fake()->numberBetween(10, 100),
            'image'             => 'digital_' . random_int(1, 22) . '.jpg',
            'all_images'        => $imagesStr,
            'sub_category_id'   => SubCategory::factory(),
            'created_by'        => fake()->numberBetween(1, 4),
        ];
    }
}
