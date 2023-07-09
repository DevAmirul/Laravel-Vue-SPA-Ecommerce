<?php

namespace App\Http\Livewire;

use App\Http\Traits\CateSecValidationTrait;
use App\Models\Category;
use App\Models\SubCategory;
use Livewire\Component;

class SubCategoriesUpdateController extends Component {
    use CateSecValidationTrait;

    public int $subCategoryId;
    public string $name;
    public string $slug;
    public int $category_id;
    public object $categories;

    protected array $rules = [
        'name'        => 'required|string|max:255',
        'slug'        => 'required|string|max:255',
        'category_id' => 'required|numeric',
    ];

    public function updated($propertyName): void{
        $this->validateOnly($propertyName, $this->rules);
    }

    public function mount($id): void{
        $this->subCategoryId = $id;

        $this->categories  = Category::all('id', 'name');
        $subCategory       = SubCategory::find($this->subCategoryId, ['name', 'slug', 'category_id']);
        $this->name        = $subCategory->name;
        $this->slug        = $subCategory->slug;
        $this->category_id = $subCategory->category_id;
    }

    public function save() {
        $validate = $this->validate();
        SubCategory::where('id', $this->subCategoryId)->update($validate);
        return redirect()->route('categories');
    }

    public function render() {
        return view('livewire.sub-categories-update');
    }
}
