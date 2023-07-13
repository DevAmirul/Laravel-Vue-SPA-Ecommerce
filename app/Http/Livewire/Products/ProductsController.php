<?php

namespace App\Http\Livewire\Products;

use App\Http\Traits\FileTrait;
use App\Http\Traits\TableHeaderTrait;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductsController extends Component {

    use WithPagination, TableHeaderTrait, FileTrait;

    public function mount(): void{
        $this->traitMount(
            ['Image', 'Name', 'SKU', 'Stock Status', 'Qty in Stock', 'Sub Category', 'Price', 'Discount Price', 'Offer Price', 'Action'],
            ['image', 'title', 'sku', 'stock_status', 'qty_in_stock', 'sub_category_id', 'price', 'discount_price', 'offer_price']
        );
    }

    public function update($productId): string {
        return redirect()->route('products.update', $productId);
    }

    public function destroy($id): int{
        $product = Product::find($id);
        $images  = explode(' ', $product->all_images);
        array_push($images, $product->image);
        $this->fileDestroy($images);
        return $product->delete();
    }

    public function render() {

        $products = Product::where('title', 'LIKE', '%' . $this->searchStr . '%')
            ->paginate($this->showDataPerPage, ['id', ...$this->tableDataColumnNames]);

        return view('livewire.products.products', [
            'products' => $products,
        ]);
    }
}
