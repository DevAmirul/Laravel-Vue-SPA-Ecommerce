<?php

namespace Database\Factories;

use Arr;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Coupon>
 */
class CouponFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array{
        $randomArr = ['Decimal', 'Percentage'];
        return [
            'name'       => fake()->name(),
            'discount'    => fake()->numberBetween(20, 30),
            'type'        => Arr::random($randomArr),
            'code'        => fake()->randomAscii(),
            'start_date'  => fake()->dateTime(),
            'expire_date' => fake()->dateTime(),
        ];
    }
}
