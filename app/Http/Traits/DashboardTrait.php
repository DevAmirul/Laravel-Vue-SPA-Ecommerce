<?php

namespace App\Http\Traits;

use App\Models\Order;
use App\Models\Product;
use App\Models\RevenueFromPurchaseAndSaleOfProduct;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

trait DashboardTrait {
    public string $strTimeOfSale;
    public string $strTimeOfRevenue;
    public string $strTimeOfUsers;
    public string $strTimeOfOrders;
    public string $strTimeOfArrivals;
    public string $strTimeOfRecentSale;
    public string $strTimeOfTopRevenueProducts;

    public function showRecentSaleQuery($timeStr): void{
        $this->newRecentSaleProducts = [];
        $newRecentSaleProducts       = DB::table('orders')->where('orders.order_status', 'delivered')
            ->where('orders.updated_at', '>', $this->getTime($timeStr))
            ->join('order_items', 'orders.id', '=', 'order_items.order_id')
            ->join('products', 'order_items.product_id', '=', 'products.id')
            ->select(
                'products.id as p_id', 'products.title', 'products.sale_price', 'products.sku', 'products.qty_in_stock', 'products.image'
            )->get()->unique('p_id')->take(8);

        foreach ($newRecentSaleProducts as $value) {
            array_push($this->newRecentSaleProducts, [$value->p_id, $value->image, $value->title, $value->sku, $value->sale_price, $value->qty_in_stock]);
        }
    }

    public function newArrivalProductsQuery($time): void{
        $this->newArrivalProducts = Product::where('created_at', '>', $this->getTime($time))
            ->latest()->take(8)->get(['id', 'title', 'sale_price', 'sku', 'qty_in_stock', 'image']);
    }

    public function showTopRevenueProductsQuery($timeStr): void{
        $this->topRevenueProducts = RevenueFromPurchaseAndSaleOfProduct::with('product:id,title,sale_price,image')->where('created_at', '>', $this->getTime($timeStr))->orderBy('revenue', 'desc')->take(8)->get(['id', 'sold_qty', 'revenue', 'product_id']);
    }

    public function AllCalculationsAreBasedOnDayMonthYearQuery($timeStr): void{
        $orders = Order::where('updated_at', '>', $this->getTime($timeStr))->where(function (Builder $builder) {
            $builder->where('order_status', 'approved')
                ->orWhere('order_status', 'delivered')
                ->orWhere('order_status', 'pending');
        })->get(['total', 'order_status', 'created_at']);

        $this->sale        = $orders->where('order_status', 'delivered')->count();
        $this->revenue     = $orders->where('order_status', 'delivered')->sum('total');
        $this->totalOrders = $orders->whereIn('order_status', ['approved', 'pending'])->count();

        $this->showUsersQuery($timeStr);

        $this->showRecentSaleQuery($timeStr);

        $this->newArrivalProductsQuery($timeStr);

        $this->showTopRevenueProductsQuery($timeStr);
    }

    public function setStrTime(string $timeStr): void{
        $this->strTimeOfSale               = $timeStr;
        $this->strTimeOfRevenue            = $timeStr;
        $this->strTimeOfUsers              = $timeStr;
        $this->strTimeOfOrders             = $timeStr;
        $this->strTimeOfArrivals           = $timeStr;
        $this->strTimeOfRecentSale         = $timeStr;
        $this->strTimeOfTopRevenueProducts = $timeStr;
    }

    public function getTime($time): object {
        return match ($time) {
            'This Year' => Carbon::now()->subYears(),
            'This Month' => Carbon::now()->subDay(30),
            default => Carbon::today(),
        };
    }

    public function showUsersQuery($time): void{
        $this->users = User::where('created_at', '>', $this->getTime($time))->count();
    }
}
