<?php

namespace App\Http\Traits;

use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

trait DashboardTrait {

    public function showRecentSaleQuery($time): void{
        $newRecentSaleProducts = DB::table('orders')->where('orders.status', '2')
            ->where('orders.updated_at', '>', $time)
            ->join('order_items', 'orders.id', '=', 'order_items.order_id')
            ->join('products', 'order_items.product_id', '=', 'products.id')
            ->select(
                'products.id as p_id', 'products.title', 'products.price', 'products.sku', 'products.qty_in_stock', 'products.image'
            )->get()->unique('p_id');

        foreach ($newRecentSaleProducts as $value) {
            array_push($this->newRecentSaleProducts, [$value->p_id, $value->image, $value->title, $value->sku, $value->price, $value->qty_in_stock]);
        }
    }

    public function newArrivalProductsQuery($time): void{
        $this->newArrivalProducts = Product::where('created_at', '>', $time)
            ->latest()->take(6)->get(['id', 'title', 'price', 'sku', 'qty_in_stock', 'image']);
    }

    public function getTime($time): object {
        return match ($time) {
            'This Year' => Carbon::now()->subYears(),
            'This Month' => Carbon::now()->subDay(30),
            default => Carbon::today(),
        };
    }

    public function getUsersQuery($time): void{
        $this->users = User::where('created_at', '>', $time)->count();
    }
}
