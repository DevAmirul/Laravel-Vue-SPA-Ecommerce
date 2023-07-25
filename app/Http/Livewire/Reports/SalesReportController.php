<?php

namespace App\Http\Livewire\Reports;

use App\Http\Traits\TableHeaderTrait;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class SalesReportController extends Component {
    use TableHeaderTrait, WithPagination;

    public function mount(): void{
        $this->traitMount(
            ['Orders', 'Products Quantity', 'Subtotal', 'Discount', 'Shipping', 'Total'],
            ['orders', 'qty', 'subtotal', 'discount', 'shippingCost', 'total']
        );
    }

    public function render() {
        $saleReports = $products = DB::table('orders')
            ->join('order_items', 'orders.id', '=', 'order_items.order_id')
            ->join('shipping_methods', 'orders.shipping_method_id', '=', 'shipping_methods.id')
            ->join('products', 'order_items.product_id', '=', 'products.id')
            ->selectRaw('count(orders.created_at) as orders, MONTHNAME(orders.created_at) as month, sum(order_items.qty) as qty, sum(orders.subtotal) as subtotal, sum(orders.discount) as discount, sum(orders.total) as total, sum(shipping_methods.cost) as shippingCost')
            ->groupByRaw('MONTHNAME(orders.created_at)')
            ->paginate($this->showDataPerPage);
            // ->where('MONTHNAME(orders.created_at)', 'LIKE', '%' . $this->searchStr . '%')

        return view('livewire.reports.sales-report', [
            'saleReports' => $saleReports,
        ]);
    }
}
