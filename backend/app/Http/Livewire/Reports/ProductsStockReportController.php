<?php

namespace App\Http\Livewire\Reports;

use App\Http\Traits\BooleanTableTrait;
use App\Http\Traits\TableColumnTrait;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class ProductsStockReportController extends Component {
    use TableColumnTrait, WithPagination, BooleanTableTrait;

    public string $stockAvailability = '';
    public string $quantityAbove     = '';
    public string $quantityBelow     = '';

    /**
     * Set table column.
     */
    public function mount(): void {
        $this->tableColumnTrait(
            ['Image', 'Name', 'SKU', 'Quantity', 'Stock Status'],
            ['image', 'name', 'sku', 'qty_in_stock', 'stock_status']
        );
        $this->booleanTrait(
            ['stock_status'],
            [['Out of Stock', 'In Stock']],
            [['badge text-bg-warning', 'badge text-bg-primary']]
        );
    }

    public function render(): View {
        $productStockReports = Product::where(function (Builder $builder) {
            $builder->where('name', 'LIKE', '%' . $this->searchStr . '%')
                ->orWhere('sku', 'LIKE', '%' . $this->searchStr . '%');
        })
            ->when($this->quantityAbove, function (Builder $builder) {
                $builder->where('qty_in_stock', '>', $this->quantityAbove);
            })
            ->when($this->quantityBelow, function (Builder $builder) {
                $builder->where('qty_in_stock', '<', $this->quantityBelow);
            })
            ->when($this->stockAvailability, function (Builder $builder) {
                ($this->stockAvailability == 2) ? $this->stockAvailability = 0 : null;
                $builder->where('stock_status', $this->stockAvailability);
                ($this->stockAvailability == 0) ? $this->stockAvailability = 2 : null;
            })
            ->paginate($this->showDataPerPage, [...$this->tableDataColumnNames]);

        return view('livewire.reports.products-stock-report', [
            'productStockReports' => $productStockReports,
        ]);
    }
}
