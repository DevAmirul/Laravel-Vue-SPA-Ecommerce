<?php

namespace App\Http\Livewire\Categories;

use App\Http\Traits\BooleanTableTrait;
use App\Http\Traits\FileTrait;
use App\Http\Traits\RelationTableTrait;
use App\Http\Traits\TableColumnTrait;
use App\Models\Category;
use Illuminate\Http\FileHelpers;
use Livewire\Component;

class CategoriesController extends Component {
    use TableColumnTrait, FileTrait, BooleanTableTrait, RelationTableTrait;

    public function mount(): void{
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

    public function update($categoryId) {
        return redirect()->route('categories.update', $categoryId);
    }

    public function destroy($id): void {
        $category = Category::find($id);
        $this->fileDestroy($category->image, 'products');
        $category->delete();
        $this->dispatchBrowserEvent('success-toast', ['message' => 'deleted record!']);
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
