<?php

namespace App\Http\Livewire\Reports;

use App\Http\Traits\FilterSearch;
use App\Http\Traits\getTime;
use App\Http\Traits\TableColumnTrait;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class SalesReportController extends Component {
    use WithPagination, FilterSearch, getTime;

    /**
     * Set table column.
     */
    public function mount(): void {
        $this->tableColumnTrait(
            ['Quantity', 'Subtotal', 'Discount', 'Shipping', 'Total', 'Date'],
            ['qty', 'subtotal', 'discount', 'shippingCost', 'total', 'time']
        );
    }

    public function render(): View {
        $saleReports = DB::table('orders')
            ->join('order_items', 'orders.id', '=', 'order_items.order_id')
            ->join('shipping_methods', 'orders.shipping_method_id', '=', 'shipping_methods.id')
            ->join('products', 'order_items.product_id', '=', 'products.id')
            ->selectRaw('sum(order_items.qty) as qty, sum(orders.subtotal) as subtotal, sum(orders.discount) as discount, sum(orders.total) as total, sum(shipping_methods.cost) as shippingCost, ' . $this->getTimeSql($this->groupBy, 'orders.created_at') . ' as time')
            ->when($this->searchStr, function (Builder $query) {
                $query->where('orders.id', $this->searchStr);
            })
            ->when($this->orderStatus, function (Builder $query) {
                $query->where('orders.order_status', $this->orderStatus);
            })
            ->when($this->startDate && $this->expireDate, function (Builder $query) {
                $query->whereBetween('orders.created_at', [$this->startDate, $this->expireDate]);
            })
            ->groupByRaw($this->getTimeSql($this->groupBy, 'orders.created_at'))
            ->paginate($this->showDataPerPage);

        return view('livewire.reports.sales-report', [
            'saleReports' => $saleReports,
        ]);
    }
}
