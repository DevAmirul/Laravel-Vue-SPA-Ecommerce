<?php

namespace App\Http\Livewire\Categories;

use App\Http\ServiceTraits\SubCategoriesService;
use App\Http\Traits\CreateSlugTrait;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\View\View;
use Livewire\Component;

class SubCategoriesUpdateController extends Component {
    use CreateSlugTrait, SubCategoriesService;

    public string $pageUrl = 'update';

    /**
     * Get subcategory by id.
     */
    public function mount(int $id): void {
        $this->subCategoryId = $id;

        $this->categories = Category::whereStatus(1)->get(['id', 'name']);

        $subCategory = SubCategory::findOrFail($this->subCategoryId, ['name', 'slug', 'status', 'category_id']);

        $this->name        = $subCategory->name;
        $this->slug        = $subCategory->slug;
        $this->status      = $subCategory->status;
        $this->category_id = $subCategory->category_id;
    }

    /**
     * Update subcategory.
     */
    public function update(): void {
        $validate = $this->validate();

        SubCategory::where('id', $this->subCategoryId)->update($validate);

        $this->dispatchBrowserEvent('success-toast', ['message' => 'Updated record!']);
    }

    public function render(): View {
        return view('livewire.categories.sub-categories-update');
    }
}
