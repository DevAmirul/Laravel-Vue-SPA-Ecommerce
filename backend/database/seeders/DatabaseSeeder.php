<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\AttributeOption;
use App\Models\BillingDetails;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ProductView;
use App\Models\RevenueFromPurchaseAndSaleOfProduct;
use App\Models\SubCategory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     */
    public function run(): void {

        \App\Models\Section::factory()
            ->has(Category::factory()->count(2)
                ->has(SubCategory::factory()->count(2)))
            ->count(3)->create();

        \App\Models\Brand::factory()->count(5)->create();
        \App\Models\Editor::factory()->create();
        \App\Models\Offer::factory()->count(3)->create();

        \App\Models\Attribute::factory()
            ->has(AttributeOption::factory()->count(3))
            ->count(2)->create();

        \App\Models\Product::factory()
            ->has(ProductView::factory()->count(1))
            ->has(RevenueFromPurchaseAndSaleOfProduct::factory()->count(1))
            ->count(30)->create();


        \App\Models\ShippingMethod::factory()->count(3)->create();
        \App\Models\GeneralSettings::factory()->count(1)->create();
        \App\Models\Coupon::factory()->count(3)->create();

        \App\Models\User::factory()
            ->has(BillingDetails::factory())
            ->has(Order::factory()->count(2)
                    ->has(OrderItem::factory()->count(2)))
            ->count(10)->create();

        \App\Models\Review::factory()->count(20)->create();
        \App\Models\PaymentType::factory()->count(2)->create();
        \App\Models\Tag::factory()->count(50)->create();
    }
}
