<?php

namespace App\Http\Livewire\Settings\Shipping;

use App\Http\ServiceTraits\MethodsService;
use App\Http\Traits\CreateSlugTrait;
use App\Models\ShippingMethod;
use Livewire\Component;

class MethodsCreateController extends Component {
    use CreateSlugTrait, MethodsService;

    public function save(): bool{
        $validate = $this->validate();
        $offer    = ShippingMethod::create($validate);
        $this->propertyResetExcept();
        dd('ok');
    }

    public function render() {
        return view('livewire.settings.shipping.methods-create');
    }
}
