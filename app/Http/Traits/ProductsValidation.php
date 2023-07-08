<?php

namespace App\Http\Traits;

use App\Http\Traits\FileTrait;
use App\Models\AttributeOption;
use App\Models\Category;
use App\Models\SubCategory;
use Livewire\WithFileUploads;

trait ProductsValidation {
    use WithFileUploads, FileTrait;

    public string $title;
    public string $slug;
    public string $sku;
    public string $description;
    public string $shortDescription;
    public string $price;
    public string | null $discountPrice = null;
    public string $stockStatus;
    public string $qtyInStock;
    public array $attributeValuesId = [];

    public int $selectedSection;
    public object | null $categories = null;
    public int $selectedCategory;
    public object | null $subCategories = null;
    public int $selectedSubCategory;

    public int $selectedAttributes;
    public object | null $attributeValues = null;

    public $image;
    public $allImages = [];

    protected $rules = [
        'title'               => 'required|string|max:255',
        'sku'                 => 'required|max:6',
        'slug'                => 'required|string|max:255',
        'description'         => 'required|string',
        'shortDescription'    => 'required|string',
        'price'               => 'required|numeric',
        'stockStatus'         => 'required|numeric|boolean',
        'qtyInStock'          => 'required|numeric',
        'selectedAttributes'  => 'required|numeric',
        'selectedSubCategory' => 'required|numeric',
    ];


    public function updated($propertyName): void{
        $this->validateOnly($propertyName, $this->rules);
    }

    public function updatedSelectedSection(): void{
        $this->categories = Category::where('section_id', $this->selectedSection)
            ->get(['id', 'name']);
    }

    public function updatedSelectedCategory(): void{
        $this->subCategories = SubCategory::where('cate_id', $this->selectedCategory)->get(['id', 'name']);
    }

    public function updatedSelectedAttributes(): void{
        $this->attributeValues = AttributeOption::where('attribute_id', $this->selectedAttributes)->get(['id', 'value']);

    }


}
