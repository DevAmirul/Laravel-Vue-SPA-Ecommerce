<?php

namespace App\Http\Livewire\Settings\Shipping;

use App\Http\Traits\CateSecValidationTrait;
use App\Models\ShippingMethod;
use Livewire\Component;

class MethodsUpdateController extends Component {
    use CateSecValidationTrait;

    public int $methodId;
    public string $name;
    public string $cost;

    protected array $rules = [
        'name' => 'required|string|max:100',
        'cost' => 'required|numeric',
    ];

    public function updated($propertyName): void{
        $this->validateOnly($propertyName, $this->rules);
    }

    public function mount($id): void{
        $this->methodId = $id;

        $method     = ShippingMethod::find($id);
        $this->name = $method->name;
        $this->cost = $method->cost;
    }

    public function save(): bool{
        $validate = $this->validate();
        $offer    = ShippingMethod::whereId($this->methodId)->update($validate);
        dd('ok');
    }

    public function render() {
        return view('livewire.settings.shipping.methods-update');
    }
}
