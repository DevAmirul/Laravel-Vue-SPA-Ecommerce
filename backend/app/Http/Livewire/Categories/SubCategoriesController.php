<?php

namespace App\Http\Livewire\Categories;

use App\Http\Traits\BooleanTableTrait;
use App\Http\Traits\RelationTableTrait;
use App\Http\Traits\TableColumnTrait;
use App\Models\SubCategory;
use Livewire\Component;
use Livewire\WithPagination;

class SubCategoriesController extends Component {
    use TableColumnTrait, BooleanTableTrait, RelationTableTrait, WithPagination;

    public function mount(): void{
        $this->tableColumnTrait(
            ['Id', 'Name', 'Slug', 'Status', 'Category Name', 'Action'],
            ['id', 'name', 'slug', 'status']
        );
        $this->booleanTrait(['status'],
            [['Unpublish', 'Publish']],
            [['badge text-bg-warning', 'badge text-bg-primary']]
        );
        $this->RelationTrait('category', ['name']);
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
