<?php

namespace App\Http\Livewire\Categories;

use App\Http\Traits\CateSecValidationTrait;
use App\Models\Section;
use Illuminate\Support\Arr;
use Livewire\Component;

class SectionsCreateController extends Component {
    use CateSecValidationTrait;

    public string $name = '';
    public string $slug = '';

    protected array $rules = [
        'name' => 'required|string|max:255',
        'slug' => 'required|string|max:255',
    ];

    public function updated($propertyName): void{
        $this->validateOnly($propertyName, $this->rules);
    }

    public function save(): bool{
        $inputFields = Arr::add($this->validate(), 'created_by', 2);
        Section::create($inputFields);
        $this->reset();

        return true;
    }

    public function render() {
        return view('livewire.categories.sections-create');
    }
}
