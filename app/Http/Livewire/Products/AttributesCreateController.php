<?php

namespace App\Http\Livewire\Products;

use App\Models\Attribute;
use App\Models\AttributeOption;
use Illuminate\Support\Arr;
use Livewire\Component;

class AttributesCreateController extends Component {
    public int $plusButton = 1;
    public string $name;
    public array $values = [];

    protected array $rules = [
        'name'   => 'required|string|max:100',
        'values' => 'required',
    ];

    public function updated($propertyName): void{
        $this->validateOnly($propertyName, $this->rules);
    }

    public function increaseInputField(): void{
        $this->plusButton++;
    }

    public function decreaseInputField(): void {
        if ($this->plusButton > 1) {
            $this->plusButton--;
        }
    }

    public function save(): void{
        $validate = $this->validate();
        $a = Arr::map($validate['values'], function ($value, $key) {
            return ['value' => $value];
        });
        $attribute = Attribute::create(['name' => $validate['name']]);
        $attribute->attributeOption()->createMany($a);
        dd($attribute->id);
    }

    public function render() {
        return view('livewire.products.attributes-create');
    }
}
