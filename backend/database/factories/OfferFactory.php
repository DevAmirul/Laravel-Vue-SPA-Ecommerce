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
            'name'   => fake()->name(),
            'title'   => fake()->text(100),
            'image'   => 'offer.jpg',
            'type'   => Arr::random(['Percentage', 'Decimal']),
            'discount'   => fake()->numberBetween(20, 40),
            'status'   => Arr::random([1, 0]),
            'start_date'   => now(),
            'expire_date'   => Carbon::now()->year(2030),
        ];
    }
}
