<?php

namespace App\Http\Livewire\Reports;

use App\Http\Traits\TableColumnTrait;
use DB;
use Livewire\Component;
use Livewire\WithPagination;

class ProductsViewReportController extends Component {
    use TableColumnTrait, WithPagination;

    public function mount(): void{
        $this->tableColumnTrait(
            ['Image', 'Title', 'SKU', 'View'],
            ['image', 'title', 'sku', 'view_count']
        );
    }

    public function render() {
        $productViewReports = DB::table('product_views as view')
            ->join('products', 'view.product_id', '=', 'products.id')
            ->select('view.view_count', 'products.title', 'products.sku', 'products.image as image')
            ->where('products.title', 'LIKE', '%' . $this->searchStr . '%')
            ->orWhere('products.sku', 'LIKE', '%' . $this->searchStr . '%')
            ->paginate($this->showDataPerPage);

        return view('livewire.reports.products-view-report', [
            'productViewReports' => $productViewReports,
        ]);
    }
}
