<?php

namespace App\Http\Livewire\Reports;

use App\Http\Traits\TableHeaderTrait;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class CategorizedProductsReportController extends Component {
    use TableHeaderTrait, WithPagination;

    public function mount(): void{
        $this->traitMount(
            ['Image', 'Name', 'Products Count'],
            ['image', 'name', 'product_count']
        );
    }

    public function render() {
        $categories = Category::withCount('product')
            ->where('name', 'LIKE', '%' . $this->searchStr . '%')->paginate($this->showDataPerPage);
        return view('livewire.reports.categorized-products-report', [
            'categories' => $categories,
        ]);
    }
}
