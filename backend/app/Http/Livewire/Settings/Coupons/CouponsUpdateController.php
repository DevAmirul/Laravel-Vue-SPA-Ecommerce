<?php

namespace App\Http\Livewire\Settings\Coupons;

use App\Http\ServiceTraits\CouponsService;
use App\Http\Traits\CreateSlugTrait;
use App\Models\Coupon;
use Livewire\Component;

class CouponsUpdateController extends Component {
    use CreateSlugTrait, CouponsService;

    public function mount($id): void{
        $this->couponId    = $id;
        $coupon            = Coupon::find($id);
        $this->name        = $coupon->name;
        $this->code        = $coupon->code;
        $this->discount    = $coupon->discount;
        $this->status      = $coupon->status;
        $this->start_date  = $coupon->start_date;
        $this->expire_date = $coupon->expire_date;
    }

    public function save() {
        $validate = $this->validate();
        Coupon::where('id', $this->couponId)->update($validate);
        return redirect()->route('settings.coupons');
    }

    public function render() {
        return view('livewire.settings.coupons.coupons-update');
    }
}
