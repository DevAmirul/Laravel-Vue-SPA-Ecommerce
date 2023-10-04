<?php

namespace App\Http\Livewire\Settings\Offers;

use App\Http\ServiceTraits\OffersService;
use App\Http\Traits\CreateSlugTrait;
use App\Http\Traits\FileTrait;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Offer;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithFileUploads;

class OffersCreateController extends Component {
    use CreateSlugTrait, OffersService, WithFileUploads, FileTrait;

    public string $pageUrl = 'create';

    /**
     * Get all category, subcategory and brand list to set offer id while creating new offer.
     */
    function mount(): void {
        $this->categories = Category::all('id', 'name');

        $this->subCategories = SubCategory::all('id', 'name');

        $this->brands = Brand::all('id', 'name');
    }

    /**
     * Create new offer.
     */
    public function create(): void {
        $validate = $this->validate();

        $validate['image'] = $this->fileUpload($this->image, 'offers');

        $offer = Offer::create($validate);

        if (!empty($this->selectedCategories)) {
            Category::whereIn('id', $this->selectedCategories)->update(['offer_id' => $offer->id]);
            Product::whereIn('category_id', $this->selectedCategories)->update(['offer_id' => $offer->id]);
        }
        if (!empty($this->selectedSubCategories)) {
            SubCategory::whereIn('id', $this->selectedSubCategories)->update(['offer_id' => $offer->id]);
            Product::whereIn('sub_category_id', $this->selectedSubCategories)->update(['offer_id' => $offer->id]);
        }
        if (!empty($this->selectedBrands)) {
            Brand::whereIn('id', $this->selectedBrands)->update(['offer_id' => $offer->id]);
            Product::whereIn('brand_id', $this->selectedBrands)->update(['offer_id' => $offer->id]);
        }

        $this->propertyResetExcept();

        $this->dispatchBrowserEvent('success-toast', ['message' => 'Inserted record!']);
    }

    public function render(): View {
        return view('livewire.settings.offers.offers-create');
    }
}
