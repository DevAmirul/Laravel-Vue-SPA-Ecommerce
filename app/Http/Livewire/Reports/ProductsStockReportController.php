<?php

namespace App\Http\Livewire\Reports;

use App\Http\Traits\BooleanTableTrait;
use App\Http\Traits\TableColumnTrait;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductsStockReportController extends Component {
    use TableColumnTrait, WithPagination, BooleanTableTrait;

    public function mount(): void{
        $this->tableColumnTrait(
            ['Image', 'Title', 'Quantity', 'Stock Status'],
            ['image', 'title', 'qty_in_stock', 'stock_status']
        );
        $this->booleanTrait(
            ['stock_status'],
            [['InStock', 'Out of Stock']],
            [['badge text-bg-primary', 'badge text-bg-warning']]
        );
    }

    public function render() {
        $productStockReports = Product::where('title', 'LIKE', '%' . $this->searchStr . '%')
            ->paginate($this->showDataPerPage, [...$this->tableDataColumnNames]);

        return view('livewire.reports.products-stock-report', [
            'productStockReports' => $productStockReports,
        ]);
    }
}
