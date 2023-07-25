<?php

namespace App\Http\Livewire\Categories;

use App\Http\ServiceTraits\SubCategoriesService;
use App\Http\Traits\CreateSlugTrait;
use App\Models\Category;
use App\Models\SubCategory;
use Livewire\Component;

class SubCategoriesCreateController extends Component {
    use CreateSlugTrait, SubCategoriesService;

    public function save(): bool{
        $validate = $this->validate();
        SubCategory::create($validate);
        $this->propertyResetExcept();
        return true;
    }

    public function render() {
        $allCategories = Category::all('id', 'name');
        return view('livewire.categories.sub-categories-create', [
            'allCategories' => $allCategories,
        ]);
    }
}
