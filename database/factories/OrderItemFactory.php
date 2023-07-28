<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderItem>
 */
class OrderItemFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_id'       => Order::class,
            'product_id'     => random_int(1, 25),
            'qty'            => random_int(1, 5),
            'discount_price' => fake()->numberBetween(10, 100),
        ];
    }
}
