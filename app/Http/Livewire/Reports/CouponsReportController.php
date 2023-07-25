<?php

namespace App\Http\Livewire\Reports;

use App\Http\Traits\TableColumnTrait;
use DB;
use Livewire\Component;
use Livewire\WithPagination;

class CouponsReportController extends Component {
    use TableColumnTrait, WithPagination;

    public function mount(): void{
        $this->tableColumnTrait(
            ['Title', 'Discount', 'Type', 'Orders', 'Amount of Money'],
            ['title', 'discount', 'type', 'order_qty', 'order_amount_of_money']
        );
    }

    public function render() {
        $couponsReports = DB::table('coupons')
            ->join('order_by_coupons', 'coupons.id', '=', 'order_by_coupons.coupon_id')
            ->select('coupons.title', 'coupons.discount', 'coupons.type', 'order_by_coupons.order_qty', 'order_by_coupons.order_amount_of_money')
            ->where('coupons.title', 'LIKE', '%' . $this->searchStr . '%')
            ->paginate($this->showDataPerPage);

        return view('livewire.reports.coupons-report', [
            'couponsReports' => $couponsReports,
        ]);
    }
}
