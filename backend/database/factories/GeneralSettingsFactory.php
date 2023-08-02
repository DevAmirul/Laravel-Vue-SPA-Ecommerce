<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GeneralSettings>
 */
class GeneralSettingsFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {
        $imagesStr = '';
        for ($i = 0; $i < 3; $i++) {
            $imagesStr .= 'digital_' . random_int(1, 22) . '.jpg' . ',';
        }
        return [
            'name'      => fake()->company(),
            'logo'      => 'logo.jpg',
            'slides'    => $imagesStr,
            'slogan'    => fake()->title(),
            'email'     => fake()->companyEmail(),
            'phone'     => '01834513106',
            'phone_2'   => '01521731612',
            'address'   => fake()->address(),
            'zip_code'  => '1226',
            'facebook'  => 'fb.com',
            'youtube'   => 'ytub.com',
            'twitter'   => 'twitter.com',
            'instagram' => 'insta.com',
        ];
    }
}
