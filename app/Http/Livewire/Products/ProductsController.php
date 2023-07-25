<?php

namespace App\Http\Livewire\Products;

use App\Http\Traits\BooleanTableTrait;
use App\Http\Traits\FileTrait;
use App\Http\Traits\TableColumnTrait;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductsController extends Component {

    use WithPagination, BooleanTableTrait, TableColumnTrait, FileTrait;

    public function mount(): void{
        $this->tableColumnTrait(
            ['Image', 'Name', 'SKU', 'Stock Status', 'Qty in Stock', 'Sub Category', 'Price', 'Discount Price', 'Offer Price', 'Action'],
            ['image', 'title', 'sku', 'stock_status', 'qty_in_stock', 'sub_category_id', 'price', 'discount_price', 'offer_price']
        );
        $this->booleanTrait(
            ['status'],
            [['Unpublish', 'Publish']],
            [['badge text-bg-warning', 'badge text-bg-primary']]
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
