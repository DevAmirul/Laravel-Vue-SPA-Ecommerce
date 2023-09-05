<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array{
        $name      = fake()->name();
        $slug      = Str::slug($name);
        $imagesStr = '';
        for ($i = 0; $i < 3; $i++) {
            $imagesStr .= 'digital_' . random_int(1, 22) . '.jpg' . ',';
        }
        return [
            'name'           => $name,
            'slug'            => $slug,
            'sku'             => $name . random_int(1, 50),
            'description'     => fake()->text(500),
            'stock_status'    => random_int(0, 1),
            'qty_in_stock'    => fake()->numberBetween(10, 100),
            'sale_price'      => fake()->numberBetween(200, 1000),
            'original_price'  => fake()->numberBetween(200, 500),
            'image'           => 'digital_' . random_int(1, 35) . '.jpg',
            'gallery'         => $imagesStr,
            'category_id'     => fake()->numberBetween(1, 3),
            'sub_category_id' => fake()->numberBetween(1, 9),
            'brand_id'        => fake()->numberBetween(1, 5),
            'specification'   => '<figure class="table"><table><thead><tr><th colspan="2"><strong>Display</strong></th></tr></thead><tbody><tr><td>Size</td><td>6.56 inches</td></tr><tr><td>Type</td><td>IPS LCD</td></tr><tr><td>Resolution</td><td>720 x 1612 (HD+)</td></tr><tr><td>Refresh Rate</td><td>60Hz</td></tr><tr><td>Brightness</td><td>Standard maximum brightness: 480nits<br>Maximum brightness under sunlight: 600nits</td></tr><tr><td>Protection &nbsp; &nbsp; &nbsp; &nbsp;</td><td>Panda Glass</td></tr><tr><td>Features</td><td>103.4 cm2 (~83.3% screen-to-body ratio)<br>20:9 ratio (~269 ppi density)</td></tr></tbody></table></figure><figure class="table"><table><thead><tr><th colspan="2"><strong>Processor</strong></th></tr></thead><tbody><tr><td>Chipset</td><td>Mediatek MT6765 Helio G35 (12 nm)</td></tr><tr><td>CPU Type</td><td>Octa-core</td></tr><tr><td>CPU Speed &nbsp; &nbsp; &nbsp; &nbsp;</td><td>4x2.3 GHz Cortex-A53 &amp; 4x1.8 GHz Cortex-A53</td></tr><tr><td>GPU</td><td>PowerVR GE8320 @ 680MHz</td></tr></tbody></table></figure><figure class="table"><table><thead><tr><th colspan="2"><strong>Memory</strong></th></tr></thead><tbody><tr><td>RAM</td><td>3GB LPDDR4X @ 1600MHz, dual 16-bit channels</td></tr><tr><td>Internal Storage</td><td>64GB eMMC 5.1</td></tr><tr><td>Card Slot</td><td>microSDXC</td></tr></tbody></table></figure>',
        ];
    }
}
