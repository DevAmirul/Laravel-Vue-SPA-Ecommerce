<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RevenueFromPurchaseAndSaleOfProduct>
 */
class RevenueFromPurchaseAndSaleOfProductFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => Product::class,
            'revenue'    => random_int(1000, 5500),
            'cost'       => random_int(1000, 4000),
            'sold_qty'   => random_int(10, 200),
        ];
    }
}
