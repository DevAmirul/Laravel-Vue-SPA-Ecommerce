<?php

namespace App\Http\Livewire\Reports;

use App\Http\Traits\TableHeaderTrait;
use DB;
use Livewire\Component;
use Livewire\WithPagination;

class ProductsViewReportController extends Component {
    use TableHeaderTrait, WithPagination;

    public function mount(): void{
        $this->traitMount(
            ['Image', 'Title', 'View'],
            ['image', 'title', 'view_count']
        );
    }

    public function render() {
        $products = DB::table('product_views as view')
            ->join('products', 'view.product_id', '=', 'products.id')
            ->select('view.view_count', 'products.title', 'products.image as image')
            ->where('products.title', 'LIKE', '%' . $this->searchStr . '%')
            ->paginate($this->showDataPerPage);
            
        return view('livewire.reports.products-view-report', [
            'products' => $products,
        ]);
    }
}
