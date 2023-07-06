<?php

namespace App\Http\Livewire;

use App\Http\Traits\FileTrait;
use App\Models\Attribute;
use App\Models\AttributeOption;
use App\Models\Category;
use App\Models\Product;
use App\Models\Section;
use App\Models\SubCategory;
use Livewire\Component;
use Livewire\WithFileUploads;
use PhpParser\Node\Expr\BinaryOp\BooleanOr;
use SebastianBergmann\Type\TrueType;

class ProductsCreateController extends Component {
    use WithFileUploads, FileTrait;

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
    public $allImages = [];

    protected $rules = [
        'title'               => 'required|string',
        'sku'                 => 'required|max:6',
        'slug'                => 'required|string',
        'description'         => 'required|string',
        'shortDescription'    => 'required|string',
        'price'               => 'required|numeric',
        'discountPrice'       => 'numeric',
        'stockStatus'         => 'required|numeric',
        'qtyInStock'          => 'required|numeric',
        'selectedAttributes'  => 'required|numeric',
        'selectedSection'     => 'required|numeric',
        'selectedCategory'    => 'required|numeric',
        'selectedSubCategory' => 'required|numeric',
        'image'               => 'required|mimes:jpeg,png,jpg',
        // 'attributeValuesId'   => 'required|numeric',
    ];

    public function updated($propertyName): void{
        $this->validateOnly($propertyName, $this->rules);
    }

    public function productsCreate(): void{
        $val = $this->validate();

        $product = new Product();

        $product->title             = $this->title;
        $product->slug              = $this->slug;
        $product->sku               = $this->sku;
        $product->description       = $this->description;
        $product->short_description = $this->shortDescription;
        $product->price             = $this->price;
        $product->discount_price    = $this->discountPrice ?? null;
        $product->stock_status      = $this->stockStatus;
        $product->qty_in_stock      = $this->qtyInStock;
        $product->sub_category_id   = $this->selectedSubCategory;
        $product->image             = $this->fileUpload($this->image);
        $product->all_images        = $this->fileUpload($this->allImages);
        $product->created_by        = 1;
        // $product->selectedAttributes  = $this->selectedAttributes;
        // $product->attributeValuesId   = $this->attributeValuesId;
        $product->save();
        dd('ok');
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
