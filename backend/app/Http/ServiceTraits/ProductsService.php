<?php

namespace App\Http\ServiceTraits;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;

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
    public ?string $specification   = 'ok';
    public string $product_tag;

    public int $selectedSection;
    public ?object $categories = null;
    public int $selectedCategory;
    public ?object $subCategories = null;
    public int $sub_category_id;
    public int $brand_id;
    public  ? array $selectedTags;
    public ?string $tags;

    // public int $category_id;
    // public int $selectedAttributes;
    // public ?object $attributeValues = null;

    public $image;
    public string $oldImage;
    public $gallery = [];
    public string $oldGallery;

    protected function rules() {
        if ($this->pageUrl == 'update') {
            $rulesForUpdate = [
                'name'             => 'required|string|max:255',
                'slug'             => 'required|string|max:255',
                'sku'              => 'required|max:10',
                'sale_price'       => 'required|numeric',
                'original_price'   => 'nullable|numeric',
                'qty_in_stock'     => 'required|numeric',
                'stock_status'     => 'required|boolean',
                'status'           => 'required|boolean',
                'selectedCategory' => 'required|numeric',
                'sub_category_id'  => 'required|numeric',
                'brand_id'         => 'required|numeric',
                'selectedTags'     => 'required|array',
                'description'      => 'required|string',
                'specification'    => 'required|string',
            ];

            (gettype($this->image) == 'object') ? $rulesForUpdate['image']                                = 'required|mimes:jpeg,png,jpg' : null;
            (gettype($this->gallery) == 'array' && !empty($this->gallery)) ? $rulesForUpdate['gallery.*'] = 'required|mimes:jpeg,png,jpg' : null;

            return $rulesForUpdate;
        } else {
            return [
                'name'             => 'required|string|max:255',
                'slug'             => 'required|string|max:255',
                'sku'              => 'required|max:10',
                'sale_price'       => 'required|numeric',
                'original_price'   => 'nullable|numeric',
                'qty_in_stock'     => 'required|numeric',
                'stock_status'     => 'required|boolean',
                'status'           => 'required|boolean',
                'selectedCategory' => 'required|numeric',
                'sub_category_id'  => 'required|numeric',
                'brand_id'         => 'required|numeric',
                'selectedTags'     => 'required|array',
                'description'      => 'required|string',
                'specification'    => 'required|string',
                'image'            => 'required|mimes:jpg,jpeg,png',
                'gallery.*'        => 'required|mimes:jpg,jpeg,png',
            ];
        }
    }

    public function updated($propertyName) : void{
        $this->validateOnly($propertyName, $this->rules());
    }

    public function updatedSelectedSection(): void{
        $this->categories = Category::where('section_id', $this->selectedSection)
            ->get(['id', 'name']);
    }

    public function updatedSelectedCategory(): void{
        $this->subCategories = SubCategory::where('category_id', $this->selectedCategory)->get(['id', 'name']);
    }

    public function beforeProductSaveFunc(): array{
        $validate                = $this->validate();
        $validate['category_id'] = $validate['selectedCategory'];

        $validate['tags'] = Tag::
            when(count($validate['selectedTags']) > 1, function (Builder $builder) use ($validate) {
                $builder->whereBetween('id', Arr::sort($validate['selectedTags']));
            })
            ->when(count($validate['selectedTags']) == 1, function (Builder $builder) use ($validate) {
                $builder->where('id', $validate['selectedTags'][0]);
            })
            ->pluck('keyword')->implode(', ');

        unset($validate['selectedCategory']);
        unset($validate['selectedTags']);

        (gettype($this->image) == 'object') ? $validate['image']                              = $this->fileUpload($this->image, 'products') : null;
        (gettype($this->gallery) == 'array' && !empty($this->gallery)) ? $validate['gallery'] = $this->fileUpload($this->gallery, 'products') : null;

        return $validate;
    }
}
