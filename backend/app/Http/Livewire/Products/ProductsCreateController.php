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
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductsCreateController extends Component {
    use ProductsService, WithFileUploads, FileTrait, CreateSlugTrait;

    public string $pageUrl = 'create';

    /**
     * Get a list of categories, tags, attributes and brand IDs to set when creating new products.
     */
    public function mount(): void {
        $this->sections = Section::whereStatus(1)->get(['id', 'name']);

        $this->brands = Brand::whereStatus(1)->get(['id', 'name']);

        $this->allTags = Tag::all(['id', 'keyword']);

        $this->allAttributes = Attribute::with('attributeOption:attribute_id,value')->get(['id', 'name']);
    }

    /**
     * Create product.
     */
    public function create(): void {
        $beforeProductSaveFunc = $this->beforeProductSaveFunc();

        $product = Product::create($beforeProductSaveFunc['validate']);

        if (!empty($beforeProductSaveFunc['attribute'])) {
            $product->productAttribute()->createMany($beforeProductSaveFunc['attribute']);
        }
        $this->dispatchBrowserEvent('success-toast', ['message' => 'Inserted record!']);
    }

    public function render(): View {
        return view('livewire.products.products-create');
    }
}
