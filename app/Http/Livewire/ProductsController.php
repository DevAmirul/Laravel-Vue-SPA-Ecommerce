<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductsController extends Component {

    use WithPagination;

    public int $showDataPerPage = 10;
    public string $searchStr    = '';

    public function render() {
        
        $products  = Product::where('title', 'LIKE', '%'.$this->searchStr.'%')
            ->paginate($this->showDataPerPage, [
                'image', 'title', 'sku', 'stock_status', 'qty_in_stock',
                'sub_category_id', 'price', 'discount_price', 'offer_price',
            ]);

        return view('livewire.products', [
            'products' => $products,
        ]);
    }
}
