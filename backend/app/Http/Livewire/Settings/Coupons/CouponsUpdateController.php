<?php

namespace App\Http\Livewire\Settings\Coupons;

use App\Http\ServiceTraits\CouponsService;
use App\Http\Traits\CreateSlugTrait;
use App\Models\Coupon;
use Illuminate\View\View;
use Livewire\Component;

class CouponsUpdateController extends Component {
    use CreateSlugTrait, CouponsService;

    /**
     * Get coupon by id.
     */
    public function mount(int $id): void {
        $this->couponId = $id;

        $coupon = Coupon::find($id);

        $this->name        = $coupon->name;
        $this->code        = $coupon->code;
        $this->discount    = $coupon->discount;
        $this->status      = $coupon->status;
        $this->start_date  = $coupon->start_date;
        $this->expire_date = $coupon->expire_date;
    }

    /**
     * Update coupon.
     */
    public function update() {
        $validate = $this->validate();

        Coupon::whereId($this->couponId)->update($validate);

        $this->dispatchBrowserEvent('success-toast', ['message' => 'Updated record!']);
    }

    public function render(): View {
        return view('livewire.settings.coupons.coupons-update');
    }
}
