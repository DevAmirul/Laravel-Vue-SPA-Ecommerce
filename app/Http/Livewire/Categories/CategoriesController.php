<?php

namespace App\Http\Livewire\Categories;

use App\Http\Traits\TableHeaderTrait;
use App\Models\Category;
use Livewire\Component;

class CategoriesController extends Component {
    use TableHeaderTrait;

    public array $booleanColNames;
    public array $booleanAttributes;

    public function mount(): void{

        $this->booleanAttributes = [
            ['Unpublish', 'Publish'],
        ];
        $this->booleanColNames = ['status'];

        $this->traitMount(
            ['Id', 'Image', 'Name', 'Slug', 'Status', 'Section Name', 'Action'],
            ['id', 'image', 'name', 'slug', 'status']
        );
    }

    public function update($categoryId) {
        return redirect()->route('categories.update', $categoryId);
    }

    public function destroy($id): int {
        return Category::destroy($id);
    }

    public function render() {
        $categories = Category::with('section:id,name')
            ->where('name', 'LIKE', '%' . $this->searchStr . '%')
            ->paginate($this->showDataPerPage);

        return view('livewire.categories.categories', [
            'categories' => $categories,
        ]);
    }
}
