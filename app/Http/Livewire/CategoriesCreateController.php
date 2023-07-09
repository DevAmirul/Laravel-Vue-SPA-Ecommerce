<?php

namespace App\Http\Livewire;

use App\Http\Traits\CateSecValidationTrait;
use App\Models\Category;
use App\Models\Section;
use Illuminate\Support\Arr;
use Livewire\Component;

class CategoriesCreateController extends Component {
    use CateSecValidationTrait;
    public string $name = '';
    public string $slug = '';
    public $selectedSection;

    protected array $rules = [
        'name' => 'required|string|max:255',
        'slug' => 'required|string|max:255',
        'selectedSection' => 'required|numeric',
    ];

    public function save(): bool{
        $inputFields = Arr::add($this->validate(), 'created_by', 2);
        $inputFields = Arr::add($inputFields, 'section_id', $this->selectedSection);

        $product = Category::create($inputFields);
        $this->reset();

        return true;
    }
    public function render() {
        $sections = Section::all(['id', 'name']);
        return view('livewire.categories-create', [
            'sections' => $sections,
        ]);
    }
}
