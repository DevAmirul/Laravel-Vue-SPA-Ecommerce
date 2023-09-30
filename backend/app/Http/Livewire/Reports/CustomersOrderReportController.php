<?php

namespace App\Http\Livewire\Reports;

use App\Http\Traits\FilterSearch;
use App\Http\Traits\getTime;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class CustomersOrderReportController extends Component {
    use WithPagination, FilterSearch, getTime;

    /**
     * Set table column.
     */
    public function mount(): void {
        $this->tableColumnTrait(
            ['Name', 'Email', 'Orders', 'Total', 'Date'],
            ['name', 'email', 'orders', 'total', 'time']
        );
    }

    public function render(): View {
        $usersReports = DB::table('orders')
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->selectRaw(
                'users.name, users.email ,count(*) as orders, sum(total) as total,' . $this->getTimeSql($this->groupBy, 'orders.created_at') . ' as time')
            ->where(function (Builder $query) {
                $query->where('users.email', 'LIKE', '%' . $this->searchStr . '%')
                    ->orWhere('users.name', 'LIKE', '%' . $this->searchStr . '%');
            })
            ->when($this->orderStatus, function (Builder $query) {
                $query->where('orders.order_status', $this->orderStatus);
            })
            ->when($this->startDate && $this->expireDate, function (Builder $query) {
                $query->whereBetween('orders.created_at', [$this->startDate, $this->expireDate]);
            })
            ->groupByRaw($this->getTimeSql($this->groupBy, 'orders.created_at') . ', users.id')
            ->paginate($this->showDataPerPage);

        return view('livewire.reports.customers-order-report', [
            'usersReports' => $usersReports,
        ]);
    }
}