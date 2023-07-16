<?php

namespace App\Http\Livewire\Categories;

use App\Http\Traits\CateSecValidationTrait;
use App\Http\Traits\FileTrait;
use App\Models\Category;
use App\Models\SubCategory;
use Livewire\Component;
use Livewire\WithFileUploads;

class SubCategoriesUpdateController extends Component {
    use WithFileUploads, FileTrait, CateSecValidationTrait;

    public int $subCategoryId;
    public string $name;
    public string $slug;
    public int $category_id;
    public object $categories;
    public int $status;
    public array $statusOption;

    protected function rules() {
        return [
            'name'        => 'required|string|max:255',
            'slug'        => 'required|string|max:255',
            'status'      => 'required|boolean',
            'category_id' => 'required|numeric',
        ];
    }

    public function updated($propertyName): void{
        $this->validateOnly($propertyName, $this->rules());
    }

    public function mount($id): void{
        $this->statusOption  = ['Unpublish', 'Publish'];
        $this->subCategoryId = $id;

        $this->categories  = Category::all('id', 'name');
        $subCategory       = SubCategory::find($this->subCategoryId, ['name', 'slug', 'status', 'category_id']);
        $this->name        = $subCategory->name;
        $this->slug        = $subCategory->slug;
        $this->status      = $subCategory->status;
        $this->category_id = $subCategory->category_id;
    }

    public function save() {
        $validate                                          = $this->validate();
        SubCategory::where('id', $this->subCategoryId)->update($validate);
        return redirect()->route('categories');
    }

    public function render() {
        return view('livewire.categories.sub-categories-update');
    }
}
