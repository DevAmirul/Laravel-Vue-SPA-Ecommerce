<?php

namespace App\Http\Livewire\Products;

use App\Models\Attribute;
use App\Models\AttributeOption;
use Illuminate\Support\Arr;
use Illuminate\View\View;
use Livewire\Component;

class AttributesCreateController extends Component {
    public int $plusButton = 1;
    public string $name;
    public array $values = [];

    protected array $rules = [
        'name'   => 'required|string|max:100',
        'values' => 'required',
    ];

    public function updated(mixed $propertyName): void {
        $this->validateOnly($propertyName, $this->rules);
    }

    /**
     * Increment attribute's value input field.
     */
    public function increaseInputField(): void {
        $this->plusButton++;
    }

    /**
     * Decrement attribute's value input field.
     */
    public function decreaseInputField(): void {
        if ($this->plusButton > 1) {
            $this->plusButton--;
        }
    }

    /**
     * Create attribute.
     */
    public function create(): void {
        $validate = $this->validate();

        $attributeValues = Arr::map($validate['values'], function ($value, $key) {
            return ['value' => $value];
        });
        $attribute = Attribute::create(['name' => $validate['name']]);
        
        $attribute->attributeOption()->createMany($attributeValues);

        $this->dispatchBrowserEvent('success-toast', ['message' => 'Inserted record!']);
    }

    public function render(): View {
        return view('livewire.products.attributes-create');
    }
}
