<?php

namespace App\Http\Livewire;

use App\Http\Traits\DashboardTrait;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class DashboardController extends Component {
    use WithPagination, DashboardTrait;

    public int $sale;
    public int $users;
    public int $totalOrders;
    public object $ordersChart;
    public object $ordersBarChart;
    public object $incomeExpenditureChart;
    public object $newArrivalProducts;
    public array $newRecentSaleProducts = [];
    public object $topRevenueProducts;
    public string $revenue;
    public $dataForChart;

    public function showSale($timeStr): void{
        $this->strTimeOfSale = $timeStr;

        $time       = $this->getTime($timeStr);
        $this->sale = Order::where('order_status', 'delivered')->where('updated_at', '>', $time)->count('order_status');

    }

    public function showOrders($timeStr): void{
        $this->strTimeOfOrders = $timeStr;
        $time                  = $this->getTime($timeStr);
        $this->totalOrders     = Order::where('updated_at', '>', $time)
            ->where(function (Builder $builder) {
                $builder->where('order_status', 'approved')
                    ->orWhere('order_status', 'pending');
            })->count();
    }

    public function showRevenue($timeStr): void{
        $this->strTimeOfRevenue = $timeStr;
        $time                   = $this->getTime($timeStr);
        $this->revenue          = Order::where('order_status', 'delivered')->where('updated_at', '>', $time)->sum('total');
    }

    public function showUsers($timeStr): void{
        $this->strTimeOfUsers = $timeStr;
        $this->showUsersQuery($timeStr);
    }

    public function showArrivals($timeStr): void{
        $this->strTimeOfArrivals = $timeStr;
        $this->newArrivalProductsQuery($timeStr);
    }

    public function showRecentSale($timeStr): void{
        $this->strTimeOfRecentSale = $timeStr;
        $this->showRecentSaleQuery($timeStr);
    }

    public function showTopRevenueProducts($timeStr): void{
        $this->strTimeOfTopRevenueProducts = $timeStr;
        $this->showTopRevenueProductsQuery($timeStr);
    }

    public function mount(): void{
        $this->setStrTime('Today');
        $this->AllCalculationsAreBasedOnDayMonthYearQuery('Today');
    }

    public function AllCalculationsAreBasedOnDayMonthYear($timeStr): void{
        $this->setStrTime($timeStr);
        $this->AllCalculationsAreBasedOnDayMonthYearQuery($timeStr);
    }


    public function render() {
        return view('livewire.dashboard');
    }
}
