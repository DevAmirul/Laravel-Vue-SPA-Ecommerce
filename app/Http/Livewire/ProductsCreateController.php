<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Section;
use App\Models\SubCategory;
use Livewire\Component;

class ProductsCreateController extends Component {

    public string $title;
    public string $slug;
    public string $sku;
    public string $description;
    public string $short_description;
    public string $information;
    public string $price;
    public string $discount_price;
    public string $stock_status;
    public string $qty_in_stock;
    public string $sub_category_id;
    public string $image;
    public string $all_images;


    public int $selectedSection;
    public object | null $categories = null;
    public int $selectedCategory;
    public object | null $subCategories = null;
    public int $selectedSubCategory;

    public function updatedSelectedSection() {
        $this->categories = Category::where('section_id', $this->selectedSection)
            ->get(['id', 'name']);
    }

    public function updatedSelectedCategory() {
        $this->subCategories = SubCategory::where('cate_id', $this->selectedCategory)->get(['id', 'name']);
    }

    public function render() {
        $sections = Section::all(['id', 'name']);

        return view('livewire.products-create', [
            'sections'      => $sections,
            'categories'    => $this->categories,
            'subCategories' => $this->subCategories,
        ]);
    }
}
