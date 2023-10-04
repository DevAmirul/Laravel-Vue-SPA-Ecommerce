<?php

namespace Database\Factories;

use App\Models\Editor;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Section>
 */
class SectionFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array{
        $name = fake()->name();
        $slug = Str::slug($name);
        return [
            'name'       => $name,
            'image'      => 'section.png',
            'slug'       => $slug,
            'status'      => array_rand([0, 1]),
        ];
    }
}
