<?php

namespace App\Http\Livewire;

use App\Http\ServiceTraits\DashboardService;
use Livewire\Component;

class DashboardController extends Component {
    use DashboardService;

    public function showSale($timeStr): void{
        $this->showSaleQuery($timeStr);
    }

    public function showOrders($timeStr): void{
        $this->showOrdersQuery($timeStr);
    }

    public function showRevenue($timeStr): void{
        $this->showRevenueQuery($timeStr);
    }

    public function showUsers($timeStr): void{
        $this->showUsersQuery($timeStr);
    }

    public function showArrivals($timeStr): void{
        $this->newArrivalProductsQuery($timeStr);
    }

    public function showRecentSale($timeStr): void{
        $this->showRecentSaleQuery($timeStr);
    }

    public function showTopRevenueProducts($timeStr): void{
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
