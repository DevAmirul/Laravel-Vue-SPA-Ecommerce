<?php

namespace App\Http\Livewire\Categories;

use App\Http\Traits\CateSecValidationTrait;
use App\Http\Traits\FileTrait;
use App\Models\Category;
use App\Models\Section;
use Livewire\Component;
use Livewire\WithFileUploads;

class CategoriesUpdateController extends Component {
    use WithFileUploads, FileTrait, CateSecValidationTrait;

    public int $categoryId;
    public string $name;
    public string $slug;
    public int $section_id;
    public object $sections;
    public int $status;
    public array $statusOption;
    public $image;
    public $oldImage;

    protected function rules() {
        $rules = [
            'name'       => 'required|string|max:255',
            'slug'       => 'required|string|max:255',
            'section_id' => 'required|numeric',
            'status'     => 'required|boolean',
        ];
        if (gettype($this->image) == 'object') {
            $rules['image'] = 'required|mimes:jpeg,png,jpg';
        }
        return $rules;
    }

    public function updated($propertyName): void{
        $this->validateOnly($propertyName, $this->rules());
    }

    public function mount($id): void{
        $this->statusOption = ['Unpublish', 'Publish'];
        $this->categoryId   = $id;

        $this->sections   = Section::all('id', 'name');
        $category         = Category::find($this->categoryId, ['name', 'image', 'slug', 'status', 'section_id']);
        $this->name       = $category->name;
        $this->image      = $category->image;
        $this->oldImage   = $category->image;
        $this->slug       = $category->slug;
        $this->status     = $category->status;
        $this->section_id = $category->section_id;
    }

    public function save() {
        $validate = $this->validate();
        if (gettype($this->image) == 'object') {
            $validate['image'] = $this->fileUpload($this->image, 'category');
        }
        Category::where('id', $this->categoryId)->update($validate);
        return redirect()->route('categories');
    }

    public function render() {
        return view('livewire.categories.categories-update');
    }
}
