<?php

namespace App\Http\ServiceTraits;

use App\Models\AttributeOption;
use App\Models\Category;
use App\Models\SubCategory;

trait ProductsService {

    public string $name;
    public string $slug;
    public string $sku;
    public string $description;
    public int $sale_price;
    public int $original_price;
    public ?int $stock_status       = null;
    public ?int $status             = null;
    public array $stockStatusOption = ['Out of Stock', 'In Stock'];
    public array $statusOption      = ['Unpublish', 'Publish'];
    public int $qty_in_stock;
    public array $attributeValuesId = [];
    public string $specification    = '';
    public string $product_tag;

    public int $section_id;
    public ?object $categories = null;
    public int $category_id;
    public ?object $subCategories = null;
    public int $subCategory_id;
    public int $brand_id;
    public array $tags;

    public int $selectedAttributes;
    public ?object $attributeValues = null;

    public $image;
    public $gallery = [];

    protected $rules = [
        'name'           => 'required|string|max:255',
        'slug'           => 'required|string|max:255',
        'sku'            => 'required|max:10',
        'sale_price'     => 'required|numeric',
        'original_price' => 'nullable|numeric',
        'qty_in_stock'   => 'required|numeric',
        'stock_status'   => 'required|boolean',
        'status'         => 'required|boolean',
        'section_id'     => 'required|numeric',
        'category_id'    => 'required|numeric',
        'subCategory_id' => 'required|numeric',
        'brand_id'       => 'required|numeric',
        'tags'           => 'required|array',
        'description'    => 'required|string',
        'specification'  => 'required|string',
        'image'          => 'required|mimes:jpg,jpeg,png',
        'gallery.*'      => 'required|mimes:jpg,jpeg,png',
    ];

    public function updated($propertyName): void{
        $this->validateOnly($propertyName, $this->rules);
    }

    public function updatedSelectedSection(): void{
        $this->categories = Category::where('section_id', $this->selectedSection)
            ->get(['id', 'name']);
    }

    public function updatedSelectedCategory(): void{
        $this->subCategories = SubCategory::where('category_id', $this->selectedCategory)->get(['id', 'name']);
    }

    public function updatedSelectedAttributes(): void{
        $this->attributeValues = AttributeOption::where('attribute_id', $this->selectedAttributes)->get(['id', 'value']);

    }

}
