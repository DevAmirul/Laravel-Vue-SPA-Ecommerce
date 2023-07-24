<?php

namespace App\Http\Livewire\Reports;

use App\Http\Traits\TableHeaderTrait;
use App\Models\Brand;
use Livewire\Component;
use Livewire\WithPagination;

class BrandedProductsReportController extends Component {
    use TableHeaderTrait, WithPagination;

    public function mount(): void{
        $this->traitMount(
            ['Image', 'Name', 'Products Count'],
            ['image', 'name', 'product_count']
        );
    }

    public function render() {
        $brands = Brand::withCount('product')
            ->where('name', 'LIKE', '%' . $this->searchStr . '%')->paginate($this->showDataPerPage);

        return view('livewire.reports.branded-products-report',[
            'brands'=>$brands
        ]);
    }
}
