<?php

namespace App\Http\Livewire\Reports;

use App\Http\Traits\FilterSearch;
use App\Http\Traits\getTime;
use App\Http\Traits\TableColumnTrait;
use App\Models\User;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class CustomersOrderReportController extends Component {
    use TableColumnTrait, WithPagination, FilterSearch, getTime;

    public function mount(): void{
        $this->tableColumnTrait(
            ['Name', 'Email', 'Orders', 'Total'],
            ['name', 'email', 'orders', 'total']
        );
    }
    public function render() {
        $usersReports = DB::table('orders')
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->select(DB::raw('users.name, users.email ,count(orders.created_at) as orders, sum(total) as total'))
            ->where('users.email', 'LIKE', '%' . '' . '%')
            ->when(true,function(Builder $query){
                $query->where('orders.order_status', 'delivered');
            })
            ->when(true,function(Builder $query){
                $query->whereBetween('orders.created_at', ['2023-07-26 13:52:43', '2023-07-28 13:52:43']);
            })
            ->groupByRaw($this->getTimeSql('This Weeks', 'orders.created_at') . ', users.id')
            ->paginate($this->showDataPerPage);
            // ->toSql();
            // dd($usersReports);

        // dd(Carbon::now()->startOfWeek());
        return view('livewire.reports.customers-order-report', [
            'usersReports' => $usersReports,
        ]);
    }
}
// ->when(true, function (Builder $query) {
//     $query->groupBy('users.id', 'orders.created_at');
// })