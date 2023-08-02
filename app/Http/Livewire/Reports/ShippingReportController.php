<?php

namespace App\Http\Livewire\Reports;

use App\Http\Traits\FilterSearch;
use App\Http\Traits\getTime;
use App\Http\Traits\TableColumnTrait;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class ShippingReportController extends Component {
    use TableColumnTrait, WithPagination, FilterSearch, getTime;

    public function mount(): void{
        $this->tableColumnTrait(
            ['Name', 'Orders', 'Total', 'Date'],
            ['name', 'orders', 'total', 'time']
        );
    }

    public function render() {
        $shippingReports = DB::table('orders')
            ->join('shipping_methods', 'orders.shipping_method_id', '=', 'shipping_methods.id')
            ->selectRaw('count(orders.created_at) as orders, sum(orders.total) as total, shipping_methods.name ,'. $this->getTimeSql($this->groupBy, 'orders.created_at') . ' as time')

            ->where(function (Builder $query) {
                $query->where('shipping_methods.name', 'LIKE', '%' . $this->searchStr . '%')
                    ->orWhere('shipping_methods.cost', 'LIKE', '%' . $this->searchStr . '%');
            })
            ->when($this->orderStatus, function (Builder $query) {
                $query->where('orders.order_status', $this->orderStatus);
            })
            ->when($this->startDate && $this->expireDate, function (Builder $query) {
                $query->whereBetween('orders.created_at', [$this->startDate, $this->expireDate]);
            })
            ->groupByRaw($this->getTimeSql($this->groupBy, 'orders.created_at') . ', orders.shipping_method_id')
            ->paginate($this->showDataPerPage);

        return view('livewire.reports.shipping-report', [
            'shippingReports' => $shippingReports,
        ]);
    }
}
