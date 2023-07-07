<?php

namespace App\Http\Livewire;

use App\Http\Traits\ProductsValidation;
use App\Models\Attribute;
use App\Models\Product;
use App\Models\Section;
use Livewire\Component;

class ProductsCreateController extends Component {
    use ProductsValidation;

    public function save(): void{
        $this->rules['selectedSection']  = 'required|numeric';
        $this->rules['selectedCategory'] = 'required|numeric';
        $this->rules['image']            = 'required|mimes:jpeg,png,jpg';

        $val = $this->validate();

        $product = new Product();

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

        $product->image      = $this->fileUpload($this->image);
        $product->all_images = $this->fileUpload($this->allImages);

        $product->created_by = 1;
        // $product->selectedAttributes  = $this->selectedAttributes;
        // $product->attributeValuesId   = $this->attributeValuesId;
        $product->save();
        dd('ok');
    }

    public function render() {
        $sections   = Section::all(['id', 'name']);
        $attributes = Attribute::all(['id', 'name']);

        return view('livewire.products-create', [
            'sections'        => $sections,
            'categories'      => $this->categories,
            'subCategories'   => $this->subCategories,
            'attributes'      => $attributes,
            'attributeValues' => $this->attributeValues,
        ]);
    }
}
