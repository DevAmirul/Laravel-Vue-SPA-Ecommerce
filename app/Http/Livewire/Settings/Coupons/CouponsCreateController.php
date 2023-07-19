<?php

namespace App\Http\Livewire\Settings\Coupons;

use App\Http\Traits\CateSecValidationTrait;
use App\Models\Coupon;
use Livewire\Component;

class CouponsCreateController extends Component {
    use CateSecValidationTrait;

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
    // TODO: enum check by enum class and enum select re design
    // TODO: status select re design

    public function updated($propertyName): void{
        $this->validateOnly($propertyName, $this->rules);
    }

    public function save(): bool{
        $validate = $this->validate();
        Coupon::create($validate);
        $this->reset();
        return true;
    }

    public function render() {
        return view('livewire.settings.coupons.coupons-create');
    }
}
