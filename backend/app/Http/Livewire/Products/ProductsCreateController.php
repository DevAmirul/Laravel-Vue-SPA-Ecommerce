<?php

namespace App\Http\Livewire\Products;

use App\Http\ServiceTraits\ProductsService;
use App\Http\Traits\CreateSlugTrait;
use App\Http\Traits\FileTrait;
use App\Models\Attribute;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Section;
use App\Models\Tag;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductsCreateController extends Component {
    use ProductsService, WithFileUploads, FileTrait, CreateSlugTrait;

    public string $pageUrl = 'create';

    public function save(): void {
        $beforeProductSaveFunc = $this->beforeProductSaveFunc();
        
        $product = Product::create($beforeProductSaveFunc['validate']);

        $product->productAttribute()->create($beforeProductSaveFunc['attribute']);

        $this->dispatchBrowserEvent('success-toast', ['message' => 'Inserted record!']);
    }

    public function render() {
        $sections   = Section::all(['id', 'name']);

        $brands     = Brand::all(['id', 'name']);

        $allTags    = Tag::all(['id', 'keyword']);

        $attributes = Attribute::with('attributeOption:attribute_id,value')->get(['id', 'name']);

        return view('livewire.products.products-create', [
            'sections'   => $sections,
            'brands'     => $brands,
            'allTags'    => $allTags,
            'attributes' => $attributes,
        ]);
    }
}
