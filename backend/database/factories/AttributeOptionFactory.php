<?php

namespace Database\Factories;

use App\Models\Attribute;
use Arr;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AttributeOption>
 */
class AttributeOptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'value'=> fake()->name(),
            'attribute_id'=> Attribute::class
        ];
    }
}
