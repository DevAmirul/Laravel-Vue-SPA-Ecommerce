<?php

namespace App\Http\Livewire\Categories;

use App\Http\ServiceTraits\SubCategoriesService;
use App\Http\Traits\CreateSlugTrait;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\View\View;
use Livewire\Component;

class SubCategoriesCreateController extends Component {
    use CreateSlugTrait, SubCategoriesService;

    public string $pageUrl = 'create';

    /**
     * Create subCategory.
     */
    public function create(): void {
        $validate = $this->validate();

        SubCategory::create($validate);

        $this->propertyResetExcept();

        $this->dispatchBrowserEvent('success-toast', ['message' => 'Inserted record!']);
    }

    function mount() : void {
        $this->categories = Category::whereStatus(1)->get(['id', 'name']);
    }

    public function render(): View {
        return view('livewire.categories.sub-categories-create');
    }
}
