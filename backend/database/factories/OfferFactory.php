<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Offer>
 */
class OfferFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'   => 1,
            'title'   => fake()->text(100),
            'type'   => Arr::random(['Percentage', 'Decimal']),
            'discount'   => 0,
            'status'   => true,
            'start_date'   => now(),
            'expire_date'   => Carbon::now()->year(2030),
        ];
    }
}
