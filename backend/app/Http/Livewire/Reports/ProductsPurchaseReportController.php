<?php

namespace App\Http\Livewire\Reports;

use App\Http\Traits\TableColumnTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class ProductsPurchaseReportController extends Component {
    use TableColumnTrait, WithPagination;

    /**
     * Set table column.
     */
    public function mount(): void {
        $this->tableColumnTrait(
            ['Image', 'Name', 'SKU', 'Revenue', 'Cost', 'Sold'],
            ['image', 'name', 'sku', 'revenue', 'cost', 'sold_qty']
        );
    }

    public function render(): View {
        $revenueReports = DB::table('revenue_from_purchase_and_sale_of_products as revenue')
            ->join('products', 'revenue.product_id', '=', 'products.id')
            ->select('revenue.cost', 'revenue.revenue', 'revenue.sold_qty', 'products.name', 'products.sku', 'products.image')
            ->where('products.name', 'LIKE', '%' . $this->searchStr . '%')
            ->orWhere('products.sku', 'LIKE', '%' . $this->searchStr . '%')
            ->paginate($this->showDataPerPage);

        return view('livewire.reports.products-purchase-report', [
            'revenueReports' => $revenueReports,
        ]);
    }
}
