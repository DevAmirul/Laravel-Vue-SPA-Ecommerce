<?php

namespace App\Http\Livewire\Reports;

use App\Http\Traits\TableColumnTrait;
use App\Models\Brand;
use Livewire\Component;
use Livewire\WithPagination;

class BrandedProductsReportController extends Component {
    use TableColumnTrait, WithPagination;

    public function mount(): void{
        $this->tableColumnTrait(
            ['Image', 'Name', 'Products Count'],
            ['image', 'name', 'product_count']
        );
    }

    public function render() {
        $brandReports = Brand::withCount('product')
            ->where('name', 'LIKE', '%' . $this->searchStr . '%')->paginate($this->showDataPerPage);

        return view('livewire.reports.branded-products-report', [
            'brandReports' => $brandReports,
        ]);
    }
}
