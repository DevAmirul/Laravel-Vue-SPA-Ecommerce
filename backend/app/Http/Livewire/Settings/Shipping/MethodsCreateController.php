<?php

namespace App\Http\Livewire\Settings\Shipping;

use App\Http\ServiceTraits\MethodsService;
use App\Http\Traits\CreateSlugTrait;
use App\Models\ShippingMethod;
use Illuminate\View\View;
use Livewire\Component;

class MethodsCreateController extends Component {
    use CreateSlugTrait, MethodsService;

    /**
     * Create new shipping method.
     */
    public function create(): Void {
        $validate = $this->validate();

        ShippingMethod::create($validate);

        $this->dispatchBrowserEvent('success-toast', ['message' => 'Inserted record!']);
    }

    public function render(): View {
        return view('livewire.settings.shipping.methods-create');
    }
}
