<?php

namespace App\Http\Livewire\Products;

use App\Http\Traits\ProductsValidation;
use App\Models\Attribute;
use App\Models\Product;
use App\Models\Section;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Livewire\Component;

class ProductsUpdateController extends Component {
    use ProductsValidation;

    public $newImage;
    public $newAllImages;

    public int $productId;

    public function mount($id): void{
        $this->productId = $id;
        $products        = Product::with('SubCategory:id,name')
            ->where('id', $id)->get();

        foreach ($products as $product) {
            $this->title               = $product->title;
            $this->slug                = $product->slug;
            $this->sku                 = $product->sku;
            $this->description         = $product->description;
            $this->shortDescription    = $product->short_description;
            $this->price               = $product->price;
            $this->discountPrice       = $product->discount_price;
            $this->stockStatus         = $product->stock_status;
            $this->qtyInStock          = $product->qty_in_stock;
            $this->selectedSubCategory = $product->sub_category_id;
            $this->image               = $product->image;
            $this->allImages           = $product->all_images;
        }

        $subCategory         = SubCategory::find($this->selectedSubCategory);
        $cateId              = $subCategory->cate_id;
        $this->subCategories = SubCategory::where('cate_id', $cateId)->get(['id', 'name']);
    }

    public function save(): void{
        if(!empty($this->newImage)){
            $this->rules['newImage'] = 'required|mimes:jpeg,png,jpg';
        }else {
            $this->rules['image'] = 'string';
        }

        $this->validate();

        $product                    = Product::find($this->productId);
        $product->title             = $this->title;
        $product->slug              = $this->slug;
        $product->sku               = $this->sku;
        $product->description       = $this->description;
        $product->short_description = $this->shortDescription;
        $product->price             = $this->price;
        $product->discount_price    = $this->discountPrice ? $this->discountPrice : null;
        $product->stock_status      = $this->stockStatus;
        $product->qty_in_stock      = $this->qtyInStock;
        $product->sub_category_id   = $this->selectedSubCategory;
        $product->updated_by = 1;
        $product->image             = $this->image;
        $product->all_images        = $this->allImages;

        if (!empty($this->newImage) && !empty($this->newAllImages)) {
            $product->image      = $this->fileUpload($this->newImage);
            $product->all_images = $this->fileUpload($this->newAllImages);
        } elseif(!empty($this->newAllImages)) {
            $product->all_images = $this->fileUpload($this->newAllImages);
        } elseif(!empty($this->newImage)){
            $product->image = $this->fileUpload($this->newImage);
        }

        $product->save();
        dd('ok');
    }

    public function render(Request $request) {
        $sections   = Section::all(['id', 'name']);
        $attributes = Attribute::all(['id', 'name']);

        return view('livewire.products.products-update', [
            'sections'        => $sections,
            'attributes'      => $attributes,
            'categories'      => $this->categories,
            'subCategories'   => $this->subCategories,
            'attributeValues' => $this->attributeValues,
        ]);
    }
}
