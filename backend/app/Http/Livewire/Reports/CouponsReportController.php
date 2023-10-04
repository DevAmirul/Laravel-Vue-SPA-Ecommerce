<?php

namespace App\Http\Livewire\Reports;

use App\Http\Traits\FilterSearch;
use App\Http\Traits\getTime;
use DB;
use Illuminate\Database\Query\Builder;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class CouponsReportController extends Component {
    use WithPagination, FilterSearch, getTime;

    /**
     * Set table column.
     */
    public function mount(): void {
        $this->tableColumnTrait(
            ['Name', 'Code', 'Discount', 'Orders', 'Total', 'Date'],
            ['name', 'code', 'discount', 'orders', 'total', 'time']
        );
    }

    public function render(): View {

        $couponsReports = DB::table('orders')
            ->join('coupons', 'orders.coupon_id', '=', 'coupons.id')
            ->selectRaw('coupons.name as name, coupons.code as code, coupons.discount as discount, count(orders.coupon_id) as orders, sum(orders.total) as total, ' . $this->getTimeSql($this->groupBy, 'orders.created_at') . ' as time')
            ->when($this->searchStr, function (Builder $query) {
                $query->where('coupons.name', 'LIKE', '%' . $this->searchStr . '%')
                    ->orWhere('coupons.code', 'LIKE', '%' . $this->searchStr . '%');
            })
            ->when($this->orderStatus, function (Builder $query) {
                $query->where('orders.order_status', $this->orderStatus);
            })
            ->when($this->startDate && $this->expireDate, function (Builder $query) {
                $query->whereBetween('orders.created_at', [$this->startDate, $this->expireDate]);
            })
            ->groupByRaw($this->getTimeSql($this->groupBy, 'orders.created_at') . ', coupons.id')
            ->paginate($this->showDataPerPage);
        // dd($couponsReports);
        return view('livewire.reports.coupons-report', [
            'couponsReports' => $couponsReports,
        ]);
    }
}
