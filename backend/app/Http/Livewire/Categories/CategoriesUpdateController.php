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

class CategoriesUpdateController extends Component {
    use WithFileUploads, FileTrait, CreateSlugTrait, CategoriesService;

    public string $pageUrl = 'update';

    /**
     * Get category by id.
     */
    public function mount(int $id): void {
        $this->categoryId = $id;

        $this->sections = Section::whereStatus(1)->get('id', 'name');

        $category = Category::findOrFail($this->categoryId, ['name', 'image', 'slug', 'status', 'section_id']);

        $this->name       = $category->name;
        $this->image      = $category->image;
        $this->oldImage   = $category->image;
        $this->slug       = $category->slug;
        $this->status     = $category->status;
        $this->section_id = $category->section_id;
    }

    /**
     * Update category.
     */
    public function update(): void {
        $validate = $this->validate();

        if (gettype($this->image) == 'object') {
            $validate['image'] = $this->fileUpload($this->image, 'categories');
        }
        Category::where('id', $this->categoryId)->update($validate);

        $this->dispatchBrowserEvent('success-toast', ['message' => 'Updated record']);
    }

    public function render(): View {
        return view('livewire.categories.categories-update');
    }
}