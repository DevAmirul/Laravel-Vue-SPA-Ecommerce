<?php

namespace App\Http\Livewire\Products;

use App\Http\ServiceTraits\ProductsService;
use App\Http\Traits\CreateSlugTrait;
use App\Http\Traits\FileTrait;
use App\Models\Attribute;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\Section;
use App\Models\SubCategory;
use App\Models\Tag;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductsUpdateController extends Component {
    use ProductsService, WithFileUploads, FileTrait, CreateSlugTrait;

    public string $pageUrl = 'update';

    /**
     * Get product's by id.
     */
    public function mount(int $id): void {
        $this->productId = $id;

        $product = Product::where('id', $id)->with('productAttribute')->first();

        $this->name             = $product->name;
        $this->slug             = $product->slug;
        $this->sku              = $product->sku;
        $this->sale_price       = $product->sale_price;
        $this->original_price   = $product->original_price;
        $this->qty_in_stock     = $product->qty_in_stock;
        $this->stock_status     = $product->stock_status;
        $this->status           = $product->status;
        $this->selectedCategory = $product->category_id;
        $this->sub_category_id  = $product->sub_category_id;
        $this->brand_id         = $product->brand_id;
        $this->tags             = $product->tags;
        $this->productAttribute = implode(',', $product->productAttribute->pluck('values')->all());
        $this->description      = $product->description;
        $this->specification    = $product->specification;
        $this->oldImage         = $product->image;
        $this->oldGallery       = $product->gallery;

        $this->categories    = Category::whereStatus(1)->get(['id', 'name']);
        $this->subCategories = SubCategory::whereStatus(1)->get(['id', 'name']);
        $this->sections      = Section::whereStatus(1)->get(['id', 'name']);
        $this->brands        = Brand::whereStatus(1)->get(['id', 'name']);
        $this->allTags       = Tag::all('id', 'keyword');
        $this->allAttributes = Attribute::with('attributeOption:attribute_id,value')->get(['id', 'name']);
    }

    /**
     * Update product.
     */
    public function update(): void {
        $beforeProductSaveFunc = $this->beforeProductSaveFunc();

        Product::whereId($this->productId)->update($beforeProductSaveFunc['validate']);

        if (!empty($beforeProductSaveFunc['attribute'])) {
            foreach ($beforeProductSaveFunc['attribute'] as $attribute) {
                ProductAttribute::updateOrCreate(
                    ["attribute_id" => $attribute['attribute_id'], 'product_id' => $this->productId],
                    ["values" => $attribute['values']]
                );
            }
        }
        $this->dispatchBrowserEvent('success-toast', ['message' => 'Updated record!']);
    }

    public function render(): View {
        return view('livewire.products.products-update');
    }
}
