<?php

namespace App\Http\Livewire\Categories;

use App\Http\Traits\BooleanTableTrait;
use App\Http\Traits\RelationTableTrait;
use App\Http\Traits\TableColumnTrait;
use App\Models\SubCategory;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class SubCategoriesController extends Component {
    use TableColumnTrait, BooleanTableTrait, RelationTableTrait, WithPagination;

    /**
     * Set table column.
     *
     * @return void
     */
    public function mount(): void {
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

    /**
     * Redirect to update controller.
     *
     * @param integer $subCategoryId
     * @return RedirectResponse
     */
    public function update(int $subCategoryId) {
        return redirect()->route('subCategories.update', $subCategoryId);
    }

    /**
     * Delete subcategory.
     *
     * @param integer $id
     * @return void
     */
    public function destroy(int $id): void {
        SubCategory::destroy($id);
        $this->dispatchBrowserEvent('success-toast', ['message' => 'deleted record!']);
    }

    public function render(): View {
        $subCategories = SubCategory::with('category:id,name')
            ->where('name', 'LIKE', '%' . $this->searchStr . '%')
            ->paginate($this->showDataPerPage);

        return view('livewire.categories.sub-categories', [
            'subCategories' => $subCategories,
        ]);
    }
}
