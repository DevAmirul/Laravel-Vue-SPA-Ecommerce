<?php

namespace App\Http\Livewire\Categories;

use App\Http\ServiceTraits\SubCategoriesService;
use App\Http\Traits\CreateSlugTrait;
use App\Models\Category;
use App\Models\SubCategory;
use Livewire\Component;

class SubCategoriesUpdateController extends Component {
    use CreateSlugTrait, SubCategoriesService;

    public function mount($id): void{
        $this->subCategoryId = $id;

        $this->categories  = Category::all('id', 'name');
        $subCategory       = SubCategory::find($this->subCategoryId, ['name', 'slug', 'status', 'category_id']);
        $this->name        = $subCategory->name;
        $this->slug        = $subCategory->slug;
        $this->status      = $subCategory->status;
        $this->category_id = $subCategory->category_id;
    }

    public function save() {
        $validate = $this->validate();
        SubCategory::where('id', $this->subCategoryId)->update($validate);
        return redirect()->route('subCategories');
    }

    public function render() {
        return view('livewire.categories.sub-categories-update');
    }
}