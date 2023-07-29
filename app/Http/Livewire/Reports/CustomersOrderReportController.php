<?php

namespace App\Http\Livewire\Reports;

use App\Http\Traits\FilterSearch;
use App\Http\Traits\getTime;
use App\Http\Traits\TableColumnTrait;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class CustomersOrderReportController extends Component {
    use TableColumnTrait, WithPagination, FilterSearch, getTime;

    public function mount(): void{
        $this->tableColumnTrait(
            ['Name', 'Email', 'Orders', 'Total', 'Date'],
            ['name', 'email', 'orders', 'total', 'date']
        );
    }

    public function updatedGroupBy(): void {
        if ($this->groupBy !== 'Today') {
            $this->tableColumnTrait(
                ['Name', 'Email', 'Orders', 'Total'],
                ['name', 'email', 'orders', 'total']
            );
        } else {
            $this->tableColumnTrait(
                ['Name', 'Email', 'Orders', 'Total', 'Date'],
                ['name', 'email', 'orders', 'total', 'date']
            );
        }
    }

    public function render() {
        $str          = $this->groupBy;
        $usersReports = DB::table('orders')
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->when($this->groupBy == 'Today', function (Builder $query) {
                $query->select(DB::raw(
                    'users.name, users.email ,count(*) as orders, sum(total) as total, orders.created_at as date'));
            })
            ->when($this->groupBy !== 'Today', function (Builder $query) {
                $query->select(DB::raw(
                    'users.name, users.email ,count(*) as orders, sum(total) as total'));
            })
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
// ->when(true, function (Builder $query) {
//     $query->groupBy('users.id', 'orders.created_at');
// })