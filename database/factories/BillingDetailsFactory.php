<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BillingDetails>
 */
class BillingDetailsFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'    => User::factory(),
            'phone'      => '01834513106',
            'address'  => fake()->address(),
            'address_2'  => fake()->address(),
            'city'       => fake()->city(),
            'state'      => fake()->state(),
            'zip_code'   => 1234,
        ];
    }
}
