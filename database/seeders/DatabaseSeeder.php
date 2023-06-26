<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Section;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     */
    public function run(): void {
        // \App\Models\UserAddress::factory()->count(1)
        //     ->for(User::factory())->create();

        // \App\Models\Category::factory()->count(2)
        //     ->for(Section::factory())->create();

        // \App\Models\Category::factory()
        //     ->has(SubCategory::factory()->count(3))->create();

        // \App\Models\Category::factory()->count(4)->create();
        // \App\Models\SubCategory::factory()->count(4)->create();
        // \App\Models\SubCategory::factory()->count(4)->create();

        \App\Models\Product::factory()->count(1)->create();
    }
}
