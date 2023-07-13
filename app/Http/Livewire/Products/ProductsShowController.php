<?php

namespace App\Http\Livewire\Products;

use App\Models\Product;
use Livewire\Component;

class ProductsShowController extends Component {
    public int $productId;

    public function mount($id): void{
        $this->productId = $id;
    }
    public function render() {
        $product = Product::find($this->productId);

        return view('livewire.products.products-show', [
            'product' => $product,
        ]);
    }
}
