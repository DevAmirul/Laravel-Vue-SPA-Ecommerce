<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\BillingDetails;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     */
    public function run(): void {

        \App\Models\User::factory()
            ->has(BillingDetails::factory())->count(3)->create();

        \App\Models\Section::factory()
            ->has(Category::factory()->count(2)->has(SubCategory::factory()->count(2)))->count(3)->create();

        \App\Models\Brand::factory()->count(5)->create();
        \App\Models\Editor::factory()->count(4)->create();
        \App\Models\Product::factory()->count(5)->create();

    }
}
