<?php

namespace App\Http\Livewire\Reports;

use App\Http\Traits\TableColumnTrait;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class CategorizedProductsReportController extends Component {
    use TableColumnTrait, WithPagination;

    public function mount(): void{
        $this->tableColumnTrait(
            ['Image', 'Name', 'Products Count'],
            ['image', 'name', 'product_count']
        );
    }

    public function render() {
        $categoriesReports = Category::withCount('product')
            ->where('name', 'LIKE', '%' . $this->searchStr . '%')->paginate($this->showDataPerPage);
            
        return view('livewire.reports.categorized-products-report', [
            'categoriesReports' => $categoriesReports,
        ]);
    }
}
