<?php

namespace App\Http\Livewire\Reports;

use App\Http\Traits\TableColumnTrait;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class CustomersOrderReportController extends Component {
    use TableColumnTrait, WithPagination;

    public function mount(): void{
        $this->tableColumnTrait(
            ['Name', 'Email', 'Orders', 'Total'],
            ['name', 'email', 'orders', 'total']
        );
    }

    public function render() {
        $usersReports = DB::table('users')
            ->join('orders', 'users.id', '=', 'orders.user_id')
            ->select(DB::raw('users.name, users.email, count(*) as orders, sum(total) as total'))
            ->where('users.name', 'LIKE', '%' . $this->searchStr . '%')
            ->groupBy('orders.user_id')
            ->paginate($this->showDataPerPage);

        return view('livewire.reports.customers-order-report', [
            'usersReports' => $usersReports,
        ]);
    }
}
