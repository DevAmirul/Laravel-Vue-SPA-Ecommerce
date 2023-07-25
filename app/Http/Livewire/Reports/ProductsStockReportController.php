<?php

namespace App\Http\Livewire\Reports;

use App\Http\Traits\TableHeaderTrait;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductsStockReportController extends Component {
    use TableHeaderTrait, WithPagination;

    public array $booleanColNames;
    public array $booleanAttributes;
    public array $booleanClass = [
        ['badge text-bg-primary', 'badge text-bg-warning'],
    ];
    public function mount(): void{
        $this->booleanAttributes = [
            ['InStock', 'Out of Stock'],
        ];
        $this->booleanColNames = ['stock_status'];
        $this->traitMount(
            ['Image', 'Title', 'Quantity', 'Stock Status'],
            ['image', 'title', 'qty_in_stock', 'stock_status']
        );
    }

    public function render() {
        $products = Product::where('title', 'LIKE', '%' . $this->searchStr . '%')
            ->paginate($this->showDataPerPage, [...$this->tableDataColumnNames]);

        return view('livewire.reports.products-stock-report', [
            'products' => $products,
        ]);
    }
}
