<?php

namespace App\Http\Livewire\Reports;

use App\Http\Traits\FilterSearch;
use App\Http\Traits\getTime;
use App\Http\Traits\TableColumnTrait;
use DB;
use Illuminate\Database\Query\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class CouponsReportController extends Component {
    use TableColumnTrait, WithPagination, FilterSearch, getTime;

    public function mount(): void{
        $this->tableColumnTrait(
            ['Title', 'Discount', 'Type', 'Orders', 'Amount of Money', 'Date'],
            ['title', 'discount', 'type', 'order_qty', 'order_amount_of_money']
        );
    }

    public function render() {
        $couponsReports = DB::table('orders')
            ->join('coupons', 'orders.coupon_id', '=', 'coupons.id')
            ->select('coupons.name as name', 'coupons.code as code', 'coupons.discount as discount', 'coupons.type as type', 'count(orders.coupon_id) as qty', 'sum(orders.total) as total')

        // ->selectRaw('sum(order_items.qty) as qty, sum(orders.subtotal) as subtotal, sum(orders.discount) as discount, sum(orders.total) as total, sum(shipping_methods.cost) as shippingCost, ' . $this->getTimeSql($this->groupBy, 'orders.created_at') . ' as time')
            ->when($this->searchStr, function (Builder $query) {
                $query->where('coupons.title', 'LIKE', '%' . $this->searchStr . '%')
                    ->orWhere('coupons.cost', 'LIKE', '%' . $this->searchStr . '%');
            })
            ->when($this->startDate && $this->expireDate, function (Builder $query) {
                $query->whereBetween('orders.created_at', [$this->startDate, $this->expireDate]);
            })
            ->groupByRaw($this->getTimeSql($this->groupBy, 'orders.created_at'))
            ->paginate($this->showDataPerPage);

        return view('livewire.reports.coupons-report', [
            'couponsReports' => $couponsReports,
        ]);
    }
}
