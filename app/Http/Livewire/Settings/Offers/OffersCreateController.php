<?php

namespace App\Http\Livewire\Settings\Offers;

use App\Http\Traits\CreateSlugTrait;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Offer;
use App\Models\SubCategory;
use Livewire\Component;

class OffersCreateController extends Component {
    use CreateSlugTrait;

    public string $title                             = '';
    public string $discount                          = '';
    public string $type                              = '';
    public int | null $status                        = null;
    public string $start_date                        = '';
    public string $expire_date                       = '';
    public array $selectedCategories                 = [];
    public array $selectedSubCategories              = [];
    public array $selectedBrands                     = [];
    public array $offersTypeOption                   = ['percentage', 'decimal'];
    public array $statusOption                       = ['Unpublish', 'Publish'];
    public array $categoryOrSubCategoryOrBrandOption = ['Category', 'SubCategory', 'Brand'];

    protected array $rules = [
        'title'       => 'required|string|max:100',
        'discount'    => 'required|string|max:255',
        'type'        => 'required',
        'status'      => 'required|boolean',
        'start_date'  => 'required|date',
        'expire_date' => 'required|date',
    ];

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
        $categories    = Category::all('id', 'name');
        $subCategories = SubCategory::all('id', 'name');
        $brands        = Brand::all('id', 'name');
        return view('livewire.settings.offers.offers-create', [
            'categories'    => $categories,
            'subCategories' => $subCategories,
            'brands'        => $brands,
        ]);
    }
}
