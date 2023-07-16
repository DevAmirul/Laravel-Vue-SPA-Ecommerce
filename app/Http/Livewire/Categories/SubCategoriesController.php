<?php

namespace App\Http\Livewire\Categories;

use App\Http\Traits\TableHeaderTrait;
use App\Models\SubCategory;
use Livewire\Component;

class SubCategoriesController extends Component {
    use TableHeaderTrait;

    public array $booleanColNames;
    public array $booleanAttributes;

    public function mount(): void{
        $this->booleanAttributes = [
            ['Unpublish', 'Publish'],
        ];
        $this->booleanColNames = ['status'];

        $this->traitMount(
            ['Id', 'Image', 'Name', 'Slug', 'Status', 'Category Name', 'Action'],
            ['id', 'image', 'name', 'slug', 'status']
        );
    }

    public function update($subCategoryId) {
        return redirect()->route('subCategories.update', $subCategoryId);
    }

    public function destroy($id): int {
        return SubCategory::destroy($id);
    }

    public function render() {
        $subCategories = SubCategory::with('category:id,name')
            ->where('name', 'LIKE', '%' . $this->searchStr . '%')
            ->paginate($this->showDataPerPage);

        return view('livewire.categories.sub-categories', [
            'subCategories' => $subCategories,
        ]);
    }
}
