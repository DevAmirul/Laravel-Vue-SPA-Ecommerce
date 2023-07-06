<?php

namespace App\Http\Livewire;

use App\Http\Traits\FileTrait;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductsController extends Component {

    use WithPagination, FileTrait;

    public int $showDataPerPage = 10;
    public string $searchStr    = '';

    public function productsDestroy($id): bool{
        $product = Product::find($id);
        $images  = explode(' ', $product->all_images);
        array_push($images, $product->image);
        return $this->fileDestroy($images);
    }

    public function render() {

        $products = Product::where('title', 'LIKE', '%' . $this->searchStr . '%')
            ->paginate($this->showDataPerPage, ['id',
                'image', 'title', 'sku', 'stock_status', 'qty_in_stock',
                'sub_category_id', 'price', 'discount_price', 'offer_price',
            ]);

        return view('livewire.products', [
            'products' => $products,
        ]);
    }
}
