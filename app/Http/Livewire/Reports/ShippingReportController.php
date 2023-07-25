<?php

namespace App\Http\Livewire\Reports;

use App\Http\Traits\TableHeaderTrait;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class ShippingReportController extends Component {
    use TableHeaderTrait, WithPagination;

    public function mount(): void{
        $this->traitMount(
            ['Name', 'Orders', 'Total'],
            ['name', 'orders', 'total']
        );
    }

    public function render() {
        $shippingReports = DB::table('orders')
            ->join('shipping_methods', 'orders.shipping_method_id', '=', 'shipping_methods.id')
            ->selectRaw('count(orders.created_at) as orders, MONTHNAME(orders.created_at) as month, sum(orders.total) as total, shipping_methods.name')
            ->groupByRaw('MONTHNAME(orders.created_at), orders.shipping_method_id')
            ->paginate($this->showDataPerPage);
            
        return view('livewire.reports.shipping-report', [
            'shippingReports' => $shippingReports,
        ]);
    }
}
