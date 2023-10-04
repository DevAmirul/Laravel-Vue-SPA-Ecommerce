<?php

namespace App\Http\Livewire\Settings\Coupons;

use App\Http\ServiceTraits\CouponsService;
use App\Http\Traits\CreateSlugTrait;
use App\Models\Coupon;
use Illuminate\View\View;
use Livewire\Component;

class CouponsCreateController extends Component {
    use CouponsService;

    /**
     * create coupon.
     */
    public function create(): void {
        $validate = $this->validate();

        Coupon::create($validate);

        $this->propertyResetExcept();

        $this->dispatchBrowserEvent('success-toast', ['message' => 'Inserted record!']);
    }

    public function render(): View {
        return view('livewire.settings.coupons.coupons-create');
    }
}
