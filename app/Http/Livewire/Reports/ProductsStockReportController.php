<?php

namespace App\Http\Livewire\Reports;

use App\Http\Traits\TableHeaderTrait;
use Livewire\Component;
use Livewire\WithPagination;

class ProductsStockReportController extends Component {
    use TableHeaderTrait, WithPagination;

    public function mount(): void{
        $this->traitMount(
            ['Image', 'Title', 'Revenue', 'Cost', 'Sold'],
            ['image', 'title', 'revenue', 'cost', 'sold_qty']
        );
    }

    public function render() {
        return view('livewire.reports.products-stock-report');
    }
}
