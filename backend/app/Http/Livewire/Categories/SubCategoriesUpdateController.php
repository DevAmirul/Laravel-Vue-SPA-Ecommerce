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

    /**
     * Get subcategory by id.
     *
     * @param integer $id
     * @return void
     */
    public function mount(int $id): void {
        $this->subCategoryId = $id;

        $this->categories = Category::all('id', 'name');

        $subCategory = SubCategory::findOrFail($this->subCategoryId, ['name', 'slug', 'status', 'category_id']);

        $this->name        = $subCategory->name;
        $this->slug        = $subCategory->slug;
        $this->status      = $subCategory->status;
        $this->category_id = $subCategory->category_id;
    }

    /**
     * Update subcategory.
     *
     * @return void
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
