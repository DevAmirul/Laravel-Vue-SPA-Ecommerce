<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\RevenueFromPurchaseAndSaleOfProduct;
use Carbon\Carbon;
use DB;

class HomeController extends Controller {

    public function index(): void {

    }

    public function showCategories(): void{
        $categories = Category::all(['id', 'name', 'image']);
    }

    public function showTopSales(): void{
        $topRevenue = RevenueFromPurchaseAndSaleOfProduct::with('product:id,name,sale_price,image')->orderBy('revenue', 'desc')->take(20)->get(['name','image','sku', 'sale_price','sale_price', 'sku']);
    }

    public function showNewArrivals(): void{
        Product::where('updated_at', '>', Carbon::now()->startOfMonth())
            ->latest()->take(20)->get(['name','image','sku', 'sale_price','sale_price', 'sku']);
    }

    public function showTopRatings(): void{
        
    }

}
