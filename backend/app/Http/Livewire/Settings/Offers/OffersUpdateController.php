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

class OffersUpdateController extends Component {
    use CreateSlugTrait, OffersService, WithFileUploads, FileTrait;

    public string $pageUrl = 'update';
    public string $category_id;

    /**
     * Get offer's by id.
     */
    public function mount(int $id): void {
        $this->offerId = $id;

        $offer = Offer::with('category', 'subCategory', 'brand')->find($id);

        $this->name           = $offer->name;
        $this->title          = $offer->title;
        $this->image          = $offer->image;
        $this->oldImage       = $offer->image;
        $this->discount       = $offer->discount;
        $this->type           = $offer->type;
        $this->status         = $offer->status;
        $this->start_date     = $offer->start_date;
        $this->expire_date    = $offer->expire_date;
        $this->category_id    = implode(',', $offer->category->pluck('id')->all());
        $this->subCategory_id = implode(',', $offer->subCategory->pluck('id')->all());
        $this->brand_id       = implode(',', $offer->brand->pluck('id')->all());

        $this->selectedCategories    = $offer->category->pluck('id')->all();
        $this->selectedSubCategories = $offer->subCategory->pluck('id')->all();
        $this->selectedBrands        = $offer->brand->pluck('id')->all();

        $this->categories    = Category::whereStatus(1)->get(['id', 'name']);
        $this->subCategories = SubCategory::whereStatus(1)->get(['id', 'name']);
        $this->brands        = Brand::whereStatus(1)->get(['id', 'name']);
    }

    /**
     * Update offer.
     */
    public function update(): void {
        $validate = $this->validate();

        if (gettype($this->image) == 'object') {
            $validate['image'] = $this->fileUpload($this->image, 'offers');
        }

        Offer::whereId($this->offerId)->update($validate);

        if (!empty($this->selectedCategories)) {
            Category::whereOfferId($this->offerId)->update(['offer_id' => null]);
            Category::whereIn('id', $this->selectedCategories)->update(['offer_id' => $this->offerId]);

            Product::whereOfferId($this->offerId)->update(['offer_id' => null]);
            Product::whereIn('category_id', $this->selectedCategories)->update(['offer_id' => $this->offerId]);
        } elseif($this->category_id) {
            Category::whereOfferId($this->offerId)->update(['offer_id' => null]);
            Product::whereOfferId($this->offerId)->update(['offer_id' => null]);
        }

        if (!empty($this->selectedSubCategories)) {
            SubCategory::whereOfferId($this->offerId)->update(['offer_id' => null]);
            SubCategory::whereIn('id', $this->selectedSubCategories)->update(['offer_id' => $this->offerId]);

            Product::whereOfferId($this->offerId)->update(['offer_id' => null]);
            Product::whereIn('sub_category_id', $this->selectedSubCategories)->update(['offer_id' => $this->offerId]);
        } elseif ($this->subCategory_id) {
            SubCategory::whereOfferId($this->offerId)->update(['offer_id' => null]);
            Product::whereOfferId($this->offerId)->update(['offer_id' => null]);
        }

        if (!empty($this->selectedBrands)) {
            Brand::whereOfferId($this->offerId)->update(['offer_id' => null]);
            Brand::whereIn('id', $this->selectedBrands)->update(['offer_id' => $this->offerId]);

            Product::whereOfferId($this->offerId)->update(['offer_id' => null]);
            Product::whereIn('brand_id', $this->selectedBrands)->update(['offer_id' => $this->offerId]);
        } elseif ($this->brand_id) {
            Brand::whereOfferId($this->offerId)->update(['offer_id' => null]);
            Product::whereOfferId($this->offerId)->update(['offer_id' => null]);
        }

        $this->dispatchBrowserEvent('success-toast', ['message' => 'Updated record!']);
    }

    public function render(): View {
        return view('livewire.settings.offers.offers-update');
    }
}
