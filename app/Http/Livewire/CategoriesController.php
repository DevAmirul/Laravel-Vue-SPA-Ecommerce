<?php

namespace App\Http\Livewire;

use App\Http\Traits\TableHeaderTrait;
use App\Models\Category;
use Livewire\Component;

class CategoriesController extends Component {
    use TableHeaderTrait;

    public function mount(): void{
        $this->traitMount(
            ['Id', 'Name', 'Slug'],
            ['id', 'name', 'slug']
        );
    }

    public function update($categoryId) {
        return redirect()->route('categories.update', $categoryId);
    }

    public function render() {
        $categories = Category::where('name', 'LIKE', '%' . $this->searchStr . '%')
            ->paginate($this->showDataPerPage, [...$this->tableDataColumnNames]);

        return view('livewire.categories', [
            'categories' => $categories,
        ]);
    }
}
