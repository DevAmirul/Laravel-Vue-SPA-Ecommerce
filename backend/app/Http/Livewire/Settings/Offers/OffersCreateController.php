<?php

namespace App\Http\Livewire\Settings\Offers;

use App\Http\ServiceTraits\OffersService;
use App\Http\Traits\CreateSlugTrait;
use App\Http\Traits\FileTrait;
use App\Models\Brand;
use App\Models\Category;
use App\Models\DiscountPrice;
use App\Models\Offer;
use App\Models\Product;
use App\Models\SubCategory;
use Livewire\Component;
use Livewire\WithFileUploads;

class OffersCreateController extends Component {
    use CreateSlugTrait, OffersService, WithFileUploads, FileTrait;

    public string $pageUrl = 'create';

    public function updated($propertyName): void{
        $this->validateOnly($propertyName, $this->rules);
    }

    public function save(): bool{
        $validate = $this->validate();
        $validate['image'] = $this->fileUpload($this->image, 'category');
        $offer    = Offer::create($validate);

        if (!empty($this->selectedCategories)) {
            $productsByCategory = Product::whereIn('category_id', $this->selectedCategories)->get('id');
            DiscountPrice::whereIn('product_id', $productsByCategory->pluck('id'))->update(['offer_id' => $offer->id]);
        }
        if (!empty($this->selectedSubCategories)) {
            $productsBySubCategory = Product::whereIn('sub_category_id', $this->selectedCategories)->get('id');
            DiscountPrice::whereIn('product_id', $productsBySubCategory->pluck('id'))->update(['offer_id' => $offer->id]);
        }
        if (!empty($this->selectedBrands)) {
            $productsByBrand = Product::whereIn('brand_id', $this->selectedCategories)->get('id');
            DiscountPrice::whereIn('product_id', $productsByBrand->pluck('id'))->update(['offer_id' => $offer->id]);
        }
        dd('ok');
    }

    public function render() {
        $allCategories    = Category::all('id', 'name');
        $allSubCategories = SubCategory::all('id', 'name');
        $allBrands        = Brand::all('id', 'name');
        return view('livewire.settings.offers.offers-create', [
            'allCategories'    => $allCategories,
            'allSubCategories' => $allSubCategories,
            'allBrands'        => $allBrands,
        ]);
    }
}
