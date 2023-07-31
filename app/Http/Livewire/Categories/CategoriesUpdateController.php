<?php

namespace App\Http\Livewire\Categories;

use App\Http\ServiceTraits\CategoriesService;
use App\Http\Traits\CreateSlugTrait;
use App\Http\Traits\FileTrait;
use App\Models\Category;
use App\Models\Section;
use Livewire\Component;
use Livewire\WithFileUploads;

class CategoriesUpdateController extends Component {
    use WithFileUploads, FileTrait, CreateSlugTrait, CategoriesService;

    public string $pageUrl = 'update';

    public function mount($id): void{
        $this->categoryId = $id;

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

        (gettype($this->image) == 'object') ? $validate['image'] = $this->fileUpload($this->image, 'category') : null;
        
        Category::where('id', $this->categoryId)->update($validate);
        $this->dispatchBrowserEvent('success-toast', ['message' => 'inserted record!']);
    }

    public function render() {
        return view('livewire.categories.categories-update');
    }
}