<?php

namespace App\Http\Livewire;

use App\Http\Traits\CateSecValidationTrait;
use App\Models\Category;
use App\Models\Section;
use Livewire\Component;

class CategoriesUpdateController extends Component {
    use CateSecValidationTrait;

    public int $categoryId;
    public string $name;
    public string $slug;
    public int $section_id;
    public object $sections;

    protected array $rules = [
        'name'       => 'required|string|max:255',
        'slug'       => 'required|string|max:255',
        'section_id' => 'required|numeric',
    ];

    public function mount($id): void{
        $this->categoryId = $id;

        $this->sections   = Section::all('id', 'name');
        $category         = Category::find($this->categoryId, ['name', 'slug', 'section_id']);
        $this->name       = $category->name;
        $this->slug       = $category->slug;
        $this->section_id = $category->section_id;
    }

    public function save() {
        $validate = $this->validate();
        Category::where('id', $this->categoryId)->update($validate);
        return redirect()->route('categories');
    }

    public function render() {
        return view('livewire.categories-update');
    }
}
