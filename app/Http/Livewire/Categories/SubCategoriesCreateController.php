<?php

namespace App\Http\Livewire\Categories;

use App\Http\Traits\CateSecValidationTrait;
use App\Models\Category;
use App\Models\SubCategory;
use Livewire\Component;

class SubCategoriesCreateController extends Component {
    use CateSecValidationTrait;

    public string $name = '';
    public string $slug = '';
    public int|null $category_id = null;
    public int|null $status = null;
    public array $statusOption = ['Unpublish', 'Publish'];

    protected array $rules = [
        'name'        => 'required|string|max:255',
        'slug'        => 'required|string|max:255',
        'status'      => 'required|boolean',
        'category_id' => 'required|numeric',
    ];

    public function updated($propertyName): void{
        $this->validateOnly($propertyName, $this->rules);
    }

    public function save(): bool{
        $validate = $this->validate();
        SubCategory::create($validate);
        $this->resetExcept();
        return true;
    }

    public function render() {
        $categories         = Category::all('id','name');
        return view('livewire.categories.sub-categories-create', [
            'categories' => $categories,
        ]);
    }
}
