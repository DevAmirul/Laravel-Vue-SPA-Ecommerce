<?php

namespace App\Http\Livewire\Settings\Shipping;

use App\Http\ServiceTraits\MethodsService;
use App\Http\Traits\CreateSlugTrait;
use App\Models\ShippingMethod;
use Livewire\Component;

class MethodsUpdateController extends Component {
    use CreateSlugTrait, MethodsService;

    public function mount($id): void{
        $this->methodId = $id;
        $method     = ShippingMethod::find($id);
        $this->name = $method->name;
        $this->cost = $method->cost;
    }

    public function save(): void{
        $validate = $this->validate();
        $offer    = ShippingMethod::whereId($this->methodId)->update($validate);
        $this->dispatchBrowserEvent('success-toast', ['message' => 'Updated record!']);
    }

    public function render() {
        return view('livewire.settings.shipping.methods-update');
    }
}
