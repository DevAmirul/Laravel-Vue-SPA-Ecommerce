<?php

namespace App\Http\Livewire\Settings\Coupons;

use App\Http\Traits\CreateSlugTrait;
use App\Models\Coupon;
use Livewire\Component;

class CouponsUpdateController extends Component {
    use CreateSlugTrait;

    public int $couponId;
    public string $title           = '';
    public string $code            = '';
    public string $discount        = '';
    public string $type            = '';
    public int | null $status      = null;
    public string $start_date      = '';
    public string $expire_date     = '';
    public array $couponTypeOption = ['percentage', 'decimal'];
    public array $statusOption     = ['Unpublish', 'Publish'];

    protected array $rules = [
        'title'       => 'required|string|max:100',
        'code'        => 'required|string|max:100',
        'discount'    => 'required|string|max:255',
        'type'        => 'required',
        'status'      => 'required|boolean',
        'start_date'  => 'required|date',
        'expire_date' => 'required|date',
    ];

    public function updated($propertyName): void{
        $this->validateOnly($propertyName, $this->rules);
    }

    public function mount($id): void{
        $this->couponId    = $id;
        $coupon            = Coupon::find($id);
        $this->title       = $coupon->title;
        $this->code        = $coupon->code;
        $this->discount    = $coupon->discount;
        $this->type        = $coupon->type;
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
