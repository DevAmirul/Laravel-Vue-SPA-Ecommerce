<?php

namespace App\Http\Livewire\Settings\Shipping;

use App\Http\ServiceTraits\MethodsService;
use App\Http\Traits\CreateSlugTrait;
use App\Models\ShippingMethod;
use Illuminate\View\View;
use Livewire\Component;

class MethodsUpdateController extends Component {
    use CreateSlugTrait, MethodsService;

    /**
     * Get shipping method's by id.
     *
     * @param integer $id
     * @return void
     */
    public function mount(int $id): void {
        $this->methodId = $id;

        $method = ShippingMethod::find($id);

        $this->name = $method->name;
        $this->cost = $method->cost;
    }

    /**
     * Update shipping method's.
     *
     * @return void
     */
    public function update(): void {
        $validate = $this->validate();

        ShippingMethod::whereId($this->methodId)->update($validate);

        $this->dispatchBrowserEvent('success-toast', ['message' => 'Updated record!']);
    }

    public function render(): View {
        return view('livewire.settings.shipping.methods-update');
    }
}
