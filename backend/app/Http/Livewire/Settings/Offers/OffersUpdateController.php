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

class OffersUpdateController extends Component {
    use CreateSlugTrait, OffersService, WithFileUploads, FileTrait;

    public string $pageUrl = 'update';

    public function mount($id): void {
        $this->offerId     = $id;
        $offer             = Offer::find($id);
        $this->name        = $offer->name;
        $this->title        = $offer->title;
        $this->image       = $offer->image;
        $this->oldImage    = $offer->image;
        $this->discount    = $offer->discount;
        $this->type        = $offer->type;
        $this->status      = $offer->status;
        $this->start_date  = $offer->start_date;
        $this->expire_date = $offer->expire_date;

        $this->categories    = Category::all('id', 'name');
        $this->subCategories = SubCategory::all('id', 'name');
        $this->brands        = Brand::all('id', 'name');
    }

    public function save(): void {
        $validate                                                = $this->validate();
        (gettype($this->image) == 'object') ? $validate['image'] = $this->fileUpload($this->image, 'category') : null;
        $offer = Offer::whereId($this->offerId)->update($validate);

        $this->dispatchBrowserEvent('success-toast', ['message' => 'Updated record!']);
    }

    public function render() {
        return view('livewire.settings.offers.offers-update');
    }
}
