<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $randomArray = ['approved', 'delivered', 'pending', 'canceled', 'returned'];
        return [
            'user_id'            => User::class,
            'order_status'       => Arr::random($randomArray),
            'discount'           => random_int(10, 100),
            'subtotal'           => random_int(100, 500),
            'total'              => random_int(100, 500),
            'coupon_id'          => random_int(1, 3),
            'shipping_method_id' => random_int(1, 3),
        ];
    }
}
