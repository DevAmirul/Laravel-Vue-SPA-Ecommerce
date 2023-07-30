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
            ['Image', 'Name', 'SKU', 'Qty', 'Sub Category', 'Sale Price', 'Original Price', 'Stock Status', 'Status', 'Action'],
            ['image', 'name', 'sku', 'qty_in_stock', 'sub_category_id', 'sale_price', 'original_price', 'stock_status', 'status']
        );
        $this->booleanTrait(
            ['stock_status', 'status'],
            [['Out Of Stock', 'InStock'], ['Unpublish', 'Publish']],
            [
                ['badge text-bg-danger', 'badge text-bg-success'],
                ['badge text-bg-warning', 'badge text-bg-primary'],
            ]
        );
    }

    public function update($productId): string {
        return redirect()->route('products.update', $productId);
    }

    public function destroy($id): void{
        $product = Product::find($id);
        $images  = explode(' ', $product->all_images);
        array_push($images, $product->image);
        $this->fileDestroy($images, 'products');
        $product->delete();
        $this->dispatchBrowserEvent('success-toast', ['message' => 'deleted record!']);
    }

    public function render() {
        $products = Product::where('name', 'LIKE', '%' . $this->searchStr . '%')
            ->paginate($this->showDataPerPage, ['id', ...$this->tableDataColumnNames]);
        return view('livewire.products.products', [
            'products' => $products,
        ]);
    }
}
