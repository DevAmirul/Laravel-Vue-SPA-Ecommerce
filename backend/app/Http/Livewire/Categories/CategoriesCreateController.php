<?php

namespace App\Http\Livewire\Categories;

use App\Http\ServiceTraits\CategoriesService;
use App\Http\Traits\CreateSlugTrait;
use App\Http\Traits\FileTrait;
use App\Models\Category;
use App\Models\Section;
use Livewire\Component;
use Livewire\WithFileUploads;

class CategoriesCreateController extends Component {
    use WithFileUploads, FileTrait, CreateSlugTrait, CategoriesService;

    public string $pageUrl = 'create';

    public function save(): void{
        $validate          = $this->validate();
        $validate['image'] = $this->fileUpload($this->image, 'category');
        Category::create($validate);
        $this->propertyResetExcept();
        $this->dispatchBrowserEvent('success-toast', ['message' => 'Inserted record!']);
    }
    public function render() {
        $allSections = Section::all(['id', 'name']);

        return view('livewire.categories.categories-create', [
            'allSections' => $allSections,
        ]);
    }
}
