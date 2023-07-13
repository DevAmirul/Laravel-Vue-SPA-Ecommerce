<?php

namespace App\Http\Livewire;

use App\Http\Traits\DashboardTrait;
use App\Models\Order;
use App\Models\RevenueFromProduct;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class DashboardController extends Component {
    use WithPagination, DashboardTrait;

    public int $sale;
    public int $users;
    public int $totalOrders;
    public object $newArrivalProducts;
    public array $newRecentSaleProducts = [];
    public object $topRevenueProducts;
    public string $revenue;
    public $dataForChart;

    public string $timeToStrForSale       = 'Today';
    public string $timeToStrForRevenue    = 'Today';
    public string $timeToStrForUsers      = 'Today';
    public string $timeToStrForOrders     = 'Today';
    public string $timeToStrForArrivals   = 'Today';
    public string $timeToStrForRecentSale = 'Today';

    public function showSale($timeStr): void{
        $this->timeToStrForSale = $timeStr;

        $time       = $this->getTime($timeStr);
        $this->sale = Order::where('status', '2')->where('updated_at', '>', $time)->count('status');

    }

    public function showUsers($timeStr): void{
        $this->timeToStrForUsers = $timeStr;
        $time                    = $this->getTime($timeStr);
        $this->getUsersQuery($time);
    }

    public function showOrders($timeStr): void{
        $this->timeToStrForOrders = $timeStr;
        $time                     = $this->getTime($timeStr);
        $this->totalOrders        = Order::where('updated_at', '>', $time)
            ->where(function (Builder $builder) {
                $builder->where('status', '2')->orWhere('status', '3');
            })->count();

    }

    public function showRevenue($timeStr): void{
        $this->timeToStrForRevenue = $timeStr;
        $time                      = $this->getTime($timeStr);
        $this->revenue             = Order::where('status', '2')->where('updated_at', '>', $time)->sum('total');
    }

    public function showArrivals($timeStr): void{
        $this->timeToStrForArrivals = $timeStr;
        $time                       = $this->getTime($timeStr);
        $this->newArrivalProductsQuery($time);
    }

    public function showRecentSale($timeStr): void{
        $this->timeToStrForRecentSale = $timeStr;
        $time                         = $this->getTime($timeStr);
        $this->newRecentSaleProducts  = [];
        $this->showRecentSaleQuery($time);
    }

    public function mount(): void{
        $this->topRevenueProducts = RevenueFromProduct::with('product:id,title,price,image')->orderBy('revenue', 'desc')->take(10)->get(['id', 'sold_qty', 'revenue', 'product_id']);

        $orders = Order::where('updated_at', '>', Carbon::today())->where(function (Builder $builder) {
            $builder->where('status', '2')->orWhere('status', '3');
        })->get(['total', 'status']);

        $this->sale        = $orders->where('status', '2')->count();
        $this->revenue     = $orders->where('status', '2')->sum('total');
        $this->totalOrders = $orders->count();

        $this->getUsersQuery(Carbon::today());

        $this->showRecentSaleQuery(Carbon::today());

        $this->newArrivalProductsQuery(Carbon::today());

        // $this->dataForChart = Order::;
    }

    public function render() {
        return view('livewire.dashboard');
    }
}
