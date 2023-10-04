<?php

namespace App\Http\Livewire\Categories;

use App\Http\ServiceTraits\CategoriesService;
use App\Http\Traits\CreateSlugTrait;
use App\Http\Traits\FileTrait;
use App\Models\Category;
use App\Models\Section;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithFileUploads;

class CategoriesCreateController extends Component {
    use WithFileUploads, FileTrait, CreateSlugTrait, CategoriesService;

    public string $pageUrl = 'create';

    /**
     * Create category.
     */
    public function create(): void {
        $validate = $this->validate();
        $validate['image'] = $this->fileUpload($this->image, 'categories');

        Category::create($validate);

        $this->propertyResetExcept();

        $this->dispatchBrowserEvent('success-toast', ['message' => 'Inserted record!']);
    }

    function mount() : void {
        $this->sections = Section::whereStatus(1)->get(['id', 'name']);
    }

    public function render(): View {
        return view('livewire.categories.categories-create');
    }
}
