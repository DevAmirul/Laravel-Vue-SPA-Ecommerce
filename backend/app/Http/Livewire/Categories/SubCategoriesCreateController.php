<?php

namespace App\Http\Livewire\Categories;

use App\Http\ServiceTraits\SubCategoriesService;
use App\Http\Traits\CreateSlugTrait;
use App\Models\Category;
use App\Models\SubCategory;
use Livewire\Component;

class SubCategoriesCreateController extends Component {
    use CreateSlugTrait, SubCategoriesService;

    public function save(): void{
        $validate = $this->validate();
        SubCategory::create($validate);
        $this->propertyResetExcept();
        $this->dispatchBrowserEvent('success-toast', ['message' => 'Inserted record!']);
    }

    public function render() {
        $allCategories = Category::all('id', 'name');
        return view('livewire.categories.sub-categories-create', [
            'allCategories' => $allCategories,
        ]);
    }
}
