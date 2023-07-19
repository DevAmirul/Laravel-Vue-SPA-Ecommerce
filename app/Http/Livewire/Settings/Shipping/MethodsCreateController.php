<?php

namespace App\Http\Livewire\Settings\Shipping;

use App\Http\Traits\CateSecValidationTrait;
use App\Models\ShippingMethod;
use Livewire\Component;

class MethodsCreateController extends Component {
    use CateSecValidationTrait;

    public string $name = '';
    public string $cost = '';

    protected array $rules = [
        'name' => 'required|string|max:100',
        'cost'  => 'required|numeric',
    ];

    public function updated($propertyName): void{
        $this->validateOnly($propertyName, $this->rules);
    }

    public function save(): bool{
        $validate = $this->validate();
        $offer    = ShippingMethod::create($validate);
        dd('ok');
    }

    public function render() {
        return view('livewire.settings.shipping.methods-create');
    }
}
