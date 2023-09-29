<?php

namespace App\Http\Livewire\Categories;

use App\Http\Traits\BooleanTableTrait;
use App\Http\Traits\FileTrait;
use App\Http\Traits\RelationTableTrait;
use App\Http\Traits\TableColumnTrait;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class CategoriesController extends Component {
    use TableColumnTrait, FileTrait, BooleanTableTrait, RelationTableTrait, WithPagination;

    /**
     * Set table column.
     *
     * @return void
     */
    public function mount(): void {
        $this->tableColumnTrait(
            ['Id', 'image', 'Name', 'Slug', 'status', 'Section', 'Action'],
            ['id', 'image', 'name', 'slug', 'status']
        );
        $this->booleanTrait(['status'],
            [['Unpublish', 'Publish']],
            [['badge text-bg-warning', 'badge text-bg-primary']]
        );
        $this->RelationTrait('section', ['name']);
    }

    /**
     * Redirect to update controller.
     *
     * @param integer $categoryId
     * @return RedirectResponse
     */
    public function update(int $categoryId): RedirectResponse {
        return redirect()->route('categories.update', $categoryId);
    }

    /**
     * Delete category.
     *
     * @param integer $id
     * @return void
     */
    public function destroy(int $id): void {
        $category = Category::findOrFail($id);

        $this->fileDestroy($category->image, 'categories');

        $category->delete();

        $this->dispatchBrowserEvent('success-toast', ['message' => 'deleted record!']);
    }

    public function render(): View {
        $categories = Category::with('section:id,name')
            ->where('name', 'LIKE', '%' . $this->searchStr . '%')
            ->paginate($this->showDataPerPage);

        return view('livewire.categories.categories', [
            'categories' => $categories,
        ]);
    }
}
