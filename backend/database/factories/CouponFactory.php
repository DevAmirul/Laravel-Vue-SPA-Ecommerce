<?php

namespace Database\Factories;

use Arr;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Coupon>
 */
class CouponFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'       => fake()->name(),
            'discount'    => fake()->unique()->randomElement([20, 30, 40, 50]),
            'code'        => fake()->word(),
            'start_date'  => now(),
            'status' => true,
            'expire_date' => Carbon::now()->year(2025),
        ];
    }
}
