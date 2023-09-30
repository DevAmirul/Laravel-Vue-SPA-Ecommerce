<?php

namespace App\Http\Livewire\Reports;

use App\Http\Traits\TableColumnTrait;
use App\Models\Brand;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class BrandedProductsReportController extends Component {
    use TableColumnTrait, WithPagination;

    /**
     * Set table column.
     */
    public function mount(): void {
        $this->tableColumnTrait(
            ['Image', 'Name', 'Products Count'],
            ['image', 'name', 'product_count']
        );
    }

    public function render(): View {
        $brandReports = Brand::withCount('product')
            ->where('name', 'LIKE', '%' . $this->searchStr . '%')->paginate($this->showDataPerPage);

        return view('livewire.reports.branded-products-report', [
            'brandReports' => $brandReports,
        ]);
    }
}
