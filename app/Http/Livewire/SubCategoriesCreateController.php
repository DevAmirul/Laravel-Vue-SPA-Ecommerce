<?php

namespace App\Http\Livewire;

use App\Http\Traits\CateSecValidationTrait;
use App\Models\Category;
use App\Models\Section;
use App\Models\SubCategory;
use Illuminate\Support\Arr;
use Livewire\Component;

class SubCategoriesCreateController extends Component {
    use CateSecValidationTrait;

    public string $name              = '';
    public string $slug              = '';
    public int $selectedSection      = 0;
    public object | null $categories = null;
    public int $selectedCategory     = 0;

    protected array $rules = [
        'name'        => 'required|string|max:255',
        'slug'        => 'required|string|max:255',
        'selectedCategory' => 'required|numeric',
    ];

    public function updatedSelectedSection(): void{
        $this->categories = Category::where('section_id', $this->selectedSection)
            ->get(['id', 'name']);
    }

    public function save(): bool{
        $inputFields = Arr::add($this->validate(), 'category_id', $this->selectedCategory);
        $inputFields = Arr::add($inputFields, 'created_by', 2);
        $product     = SubCategory::create($inputFields);
        $this->reset();

        return true;
    }

    public function render() {
        $sections = Section::all(['id', 'name']);

        return view('livewire.sub-categories-create', [
            'sections' => $sections,
        ]);
    }
}
