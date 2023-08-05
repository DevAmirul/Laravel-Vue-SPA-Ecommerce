<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DiscountPrice>
 */
class DiscountPriceFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id'  => Product::class,
            'start_date'  => \Carbon\Carbon::now()->toDateTimeString(),
            'expire_date' => \Carbon\Carbon::now()->endOfMonth()->toDateTimeString(),
        ];
    }
}
