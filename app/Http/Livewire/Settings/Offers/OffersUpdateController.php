<?php

namespace App\Http\Livewire\Settings\Offers;

use App\Http\ServiceTraits\OffersService;
use App\Http\Traits\CreateSlugTrait;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Offer;
use App\Models\SubCategory;
use Livewire\Component;

class OffersUpdateController extends Component {
    use CreateSlugTrait, OffersService;

    public string $pageUrl = 'update';

    public function updated($propertyName): void{
        $this->validateOnly($propertyName, $this->rules);
    }

    public function mount($id): void{
        $this->offerId = $id;

        $offer             = Offer::find($id);
        $this->title       = $offer->title;
        $this->discount    = $offer->discount;
        $this->type        = $offer->type;
        $this->status      = $offer->status;
        $this->start_date  = $offer->start_date;
        $this->expire_date = $offer->expire_date;

        $this->categories    = Category::all('id', 'name');
        $this->subCategories = SubCategory::all('id', 'name');
        $this->brands        = Brand::all('id', 'name');
    }

    public function save(): bool{
        $validate = $this->validate();
        Offer::whereId($this->offerId)->update($validate);

        if (!empty($this->selectedCategories)) {
            Category::whereIn('id', $this->selectedCategories)->update(['offer_id' => $this->offerId]);
        }
        if (!empty($this->selectedSubCategories)) {
            SubCategory::whereIn('id', $this->selectedSubCategories)->update(['offer_id' => $this->offerId]);
        }
        if (!empty($this->selectedBrands)) {
            Brand::whereIn('id', $this->selectedBrands)->update(['offer_id' => $this->offerId]);
        }
        // return true;
        dd('ok');
    }

    public function render() {
        return view('livewire.settings.offers.offers-update');
    }
}
