<?php

namespace App\Http\Livewire\Settings\Offers;

use App\Http\ServiceTraits\OffersService;
use App\Http\Traits\CreateSlugTrait;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Offer;
use App\Models\SubCategory;
use Livewire\Component;

class OffersCreateController extends Component {
    use CreateSlugTrait, OffersService;

    public string $pageUrl = 'create';

    public function updated($propertyName): void{
        $this->validateOnly($propertyName, $this->rules);
    }

    public function save(): bool{
        $validate = $this->validate();
        $offer    = Offer::create($validate);

        if (!empty($this->selectedCategories)) {
            Category::whereIn('id', $this->selectedCategories)->update(['offer_id' => $offer->id]);
        }
        if (!empty($this->selectedSubCategories)) {
            SubCategory::whereIn('id', $this->selectedSubCategories)->update(['offer_id' => $offer->id]);
        }
        if (!empty($this->selectedBrands)) {
            Brand::whereIn('id', $this->selectedBrands)->update(['offer_id' => $offer->id]);
        }
        // return true;
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
