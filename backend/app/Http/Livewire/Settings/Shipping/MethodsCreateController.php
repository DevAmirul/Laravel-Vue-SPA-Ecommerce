<?php

namespace App\Http\Livewire\Settings\Shipping;

use App\Http\ServiceTraits\MethodsService;
use App\Http\Traits\CreateSlugTrait;
use App\Models\ShippingMethod;
use Livewire\Component;

class MethodsCreateController extends Component {
    use CreateSlugTrait, MethodsService;

    public function save(): Void{
        $validate = $this->validate();

        ShippingMethod::create($validate);

        $this->propertyResetExcept();

        $this->dispatchBrowserEvent('success-toast', ['message' => 'Inserted record!']);
    }

    public function render() {
        return view('livewire.settings.shipping.methods-create');
    }
}
