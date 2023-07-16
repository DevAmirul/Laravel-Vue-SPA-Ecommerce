<?php

namespace App\Http\Livewire\Categories;

use App\Http\Traits\CateSecValidationTrait;
use App\Http\Traits\FileTrait;
use App\Models\Category;
use App\Models\Section;
use Livewire\Component;
use Livewire\WithFileUploads;

class CategoriesCreateController extends Component {
    use WithFileUploads, FileTrait, CateSecValidationTrait;

    public string $name           = '';
    public string $slug           = '';
    public int | null $section_id = null;
    public int | null $status     = null;
    public array $statusOption    = ['Unpublish', 'Publish'];
    public $image;

    protected array $rules = [
        'name'       => 'required|string|max:255',
        'slug'       => 'required|string|max:255',
        'section_id' => 'required|numeric',
        'status'     => 'required|boolean',
        'image'      => 'required|mimes:jpeg,png,jpg',
    ];

    public function updated($propertyName): void{
        $this->validateOnly($propertyName, $this->rules);
    }

    public function save(): bool{
        $validate          = $this->validate();
        $validate['image'] = $this->fileUpload($this->image, 'category');
        Category::create($validate);
        $this->reset();

        return true;
    }
    public function render() {
        $sections = Section::all(['id', 'name']);
        return view('livewire.categories.categories-create', [
            'sections' => $sections,
        ]);
    }
}
