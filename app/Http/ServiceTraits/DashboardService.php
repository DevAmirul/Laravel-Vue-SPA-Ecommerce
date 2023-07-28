<?php

namespace App\Http\ServiceTraits;

use App\Http\Traits\getTime;
use App\Models\Order;
use App\Models\Product;
use App\Models\RevenueFromPurchaseAndSaleOfProduct;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

trait DashboardService {
    use getTime;

    public int $sale;
    public int $users;
    public int $totalOrders;
    public string $revenue;
    public object $ordersChart;
    public object $ordersBarChart;
    public object $incomeExpenditureChart;
    public object $newArrivalProducts;
    public object $topRevenueProducts;
    public array $newRecentSaleProducts = [];

    public string $strTimeOfSale;
    public string $strTimeOfRevenue;
    public string $strTimeOfUsers;
    public string $strTimeOfOrders;
    public string $strTimeOfArrivals;
    public string $strTimeOfRecentSale;
    public string $strTimeOfTopRevenueProducts;

    public function showSaleQuery($timeStr): void{
        $this->strTimeOfSale = $timeStr;
        $this->sale          = Order::where('order_status', 'delivered')->where('updated_at', '>', $this->getTimeCarbon($timeStr))->count('order_status');
    }

    public function showOrdersQuery($timeStr): void{
        $this->strTimeOfOrders = $timeStr;
        $this->totalOrders     = Order::where('updated_at', '>', $this->getTimeCarbon($timeStr))
            ->where(function (Builder $builder) {
                $builder->where('order_status', 'approved')
                    ->orWhere('order_status', 'pending');
            })->count();
    }

    public function showRevenueQuery($timeStr): void{
        $this->strTimeOfRevenue = $timeStr;
        $this->revenue          = Order::where('order_status', 'delivered')->where('updated_at', '>', $this->getTimeCarbon($timeStr))->sum('total');
    }

    public function showRecentSaleQuery($timeStr): void{
        $this->strTimeOfRecentSale   = $timeStr;
        $this->newRecentSaleProducts = [];
        $newRecentSaleProducts       = DB::table('orders')->where('orders.order_status', 'delivered')
            ->where('orders.updated_at', '>', $this->getTimeCarbon($timeStr))
            ->join('order_items', 'orders.id', '=', 'order_items.order_id')
            ->join('products', 'order_items.product_id', '=', 'products.id')
            ->select(
                'products.id as p_id', 'products.title', 'products.sale_price', 'products.sku', 'products.qty_in_stock', 'products.image'
            )->get()->unique('p_id')->take(8);

        foreach ($newRecentSaleProducts as $value) {
            array_push($this->newRecentSaleProducts, [$value->p_id, $value->image, $value->title, $value->sku, $value->sale_price, $value->qty_in_stock]);
        }
    }

    public function newArrivalProductsQuery($timeStr): void{
        $this->strTimeOfArrivals  = $timeStr;
        $this->newArrivalProducts = Product::where('created_at', '>', $this->getTimeCarbon($timeStr))
            ->latest()->take(8)->get(['id', 'title', 'sale_price', 'sku', 'qty_in_stock', 'image']);
    }

    public function showTopRevenueProductsQuery($timeStr): void{
        $this->strTimeOfTopRevenueProducts = $timeStr;
        $this->topRevenueProducts          = RevenueFromPurchaseAndSaleOfProduct::with('product:id,title,sale_price,image')->where('created_at', '>', $this->getTimeCarbon($timeStr))->orderBy('revenue', 'desc')->take(8)->get(['id', 'sold_qty', 'revenue', 'product_id']);
    }

    public function showUsersQuery($timeStr): void{
        $this->strTimeOfUsers = $timeStr;
        $this->users          = User::where('created_at', '>', $this->getTimeCarbon($timeStr))->count();
    }

    public function showOrdersChartQuery(): void{
        $this->ordersChart = DB::table('orders')->
            select(DB::raw('count(order_status) as status_quantity, order_status'))
            ->where('created_at', '>', Carbon::now()->startOfYear())
            ->groupBy('order_status')->get();
    }

    public function showIncomeExpenditureChartQuery(): void{
        $this->incomeExpenditureChart = RevenueFromPurchaseAndSaleOfProduct::
            where('created_at', '>', Carbon::now()->startOfYear())->get(['revenue', 'cost']);
    }

    public function showOrdersBarChartQuery(): void{
        $this->ordersBarChart = Order::query()
            ->selectRaw('count(created_at) as total, MONTHNAME(created_at) as month')
            ->where('created_at', '>', Carbon::now()->startOfYear())
            ->groupByRaw('MONTHNAME(created_at)')
            ->get();
    }

    public function showOrderQuery($timeStr) {
        $orders = Order::where('updated_at', '>', $this->getTimeCarbon($timeStr))->where(function (Builder $builder) {
            $builder->where('order_status', 'approved')
                ->orWhere('order_status', 'delivered')
                ->orWhere('order_status', 'pending');
        })->get(['total', 'order_status', 'created_at']);

        $this->sale        = $orders->where('order_status', 'delivered')->count();
        $this->revenue     = $orders->where('order_status', 'delivered')->sum('total');
        $this->totalOrders = $orders->whereIn('order_status', ['approved', 'pending'])->count();
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

    public function AllCalculationsAreBasedOnDayMonthYearQuery($timeStr): void{
        $this->showOrderQuery($timeStr);

        $this->showUsersQuery($timeStr);

        $this->showRecentSaleQuery($timeStr);

        $this->newArrivalProductsQuery($timeStr);

        $this->showTopRevenueProductsQuery($timeStr);

        $this->showOrdersChartQuery();

        $this->showIncomeExpenditureChartQuery();

        $this->showOrdersBarChartQuery();
    }
}
