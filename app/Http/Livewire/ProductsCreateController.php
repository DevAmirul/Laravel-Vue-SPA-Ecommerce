<?php

namespace App\Http\Livewire;

use App\Models\Attribute;
use App\Models\AttributeOption;
use App\Models\Category;
use App\Models\Section;
use App\Models\SubCategory;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductsCreateController extends Component {
    use WithFileUploads;

    public string $title;
    public string $slug;
    public string $sku;
    public string $description;
    public string $shortDescription;
    public string $price;
    public string $discountPrice;
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
    public $allImages;

    protected $rules = [
        // 'title'               => 'required|string',
        // 'sku'                 => 'required|max:6',
        // 'slug'                => 'required|string',
        // 'description'         => 'required|string',
        // 'shortDescription'    => 'required|string',
        // 'price'               => 'required|numeric',
        // 'discountPrice'       => 'numeric',
        // 'stockStatus'         => 'required|numeric',
        // 'qtyInStock'          => 'required|numeric',
        // 'selectedAttributes'  => 'required|numeric',
        // 'selectedSection'     => 'required|numeric',
        // 'selectedCategory'    => 'required|numeric',
        // 'selectedSubCategory' => 'required|numeric',
        // 'attributeValuesId'   => 'required|numeric',
        'image'               => 'required|mimes:jpeg,png,jpg',
        // 'allImages'           => 'mimes:jpeg,png,jpg',
    ];

    public function updated($propertyName): void{
        $this->validateOnly($propertyName, $this->rules);
    }

    public function productsCreate() {
        $validatedData = $this->validate();
        $image = $validatedData['image'];

        dd($image);
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
