<?php

namespace App\Http\Livewire\Settings\Coupons;

use App\Http\ServiceTraits\CouponsService;
use App\Http\Traits\CreateSlugTrait;
use App\Models\Coupon;
use Livewire\Component;

class CouponsCreateController extends Component {
    use CreateSlugTrait, CouponsService;

    public function save(): void{
        $validate = $this->validate();
        
        Coupon::create($validate);
        
        $this->propertyResetExcept();
        
        $this->dispatchBrowserEvent('success-toast', ['message' => 'Inserted record!']);
    }

    public function render() {
        return view('livewire.settings.coupons.coupons-create');
    }
}
