<?php

namespace App\Http\Livewire\Reports;

use App\Http\Traits\BooleanTableTrait;
use App\Http\Traits\TableColumnTrait;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class ProductsStockReportController extends Component {
    use TableColumnTrait, WithPagination, BooleanTableTrait;

    public ?int $stockAvailability = 0;// TODO: change status to enum
    public ?int $quantityAbove     = null;
    public ?int $quantityBelow     = null;

    public function mount(): void{
        $this->tableColumnTrait(
            ['Image', 'Title', 'SKU', 'Quantity', 'Stock Status'],
            ['image', 'title', 'sku', 'qty_in_stock', 'stock_status']
        );
        $this->booleanTrait(
            ['stock_status'],
            [['Out of Stock', 'In Stock']],
            [['badge text-bg-warning', 'badge text-bg-primary']]
        );
    }

    public function render() {
        $productStockReports = Product::where(function (Builder $builder) {
            $builder->where('title', 'LIKE', '%' . $this->searchStr . '%')
                ->orWhere('sku', 'LIKE', '%' . $this->searchStr . '%');
        })
            ->when($this->quantityAbove, function (Builder $builder) {
                $builder->where('qty_in_stock', '>', $this->quantityAbove);
            })
            ->when($this->quantityBelow, function (Builder $builder) {
                $builder->where('qty_in_stock', '<', $this->quantityBelow);
            })
            ->when($this->stockAvailability, function (Builder $builder) {
                $builder->where('stock_status', $this->stockAvailability);
            })
            ->paginate($this->showDataPerPage, [...$this->tableDataColumnNames]);

        return view('livewire.reports.products-stock-report', [
            'productStockReports' => $productStockReports,
        ]);
    }
}
