<?php

namespace App\Http\Livewire\Reports;

use App\Http\Traits\TableHeaderTrait;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class ProductsPurchaseReportController extends Component {
    use TableHeaderTrait, WithPagination;

    public function mount(): void{
        $this->traitMount(
            ['Image','Title', 'Revenue', 'Cost', 'Sold'],
            ['image','title', 'revenue', 'cost', 'sold_qty']
        );
    }

    public function render() {
        $revenueProduct = DB::table('revenue_from_purchase_and_sale_of_products as revenue')
            ->join('products', 'revenue.product_id', '=', 'products.id')
            ->select('revenue.cost', 'revenue.revenue', 'revenue.sold_qty', 'products.title','products.image')
            ->where('products.title', 'LIKE', '%' . $this->searchStr . '%')
            ->paginate($this->showDataPerPage);

        return view('livewire.reports.products-purchase-report', [
            'revenueProduct' => $revenueProduct,
        ]);
    }
}
