<?php

namespace App\Http\Livewire;

use App\Http\Traits\TableHeaderTrait;
use App\Models\SubCategory;
use Livewire\Component;

class SubCategoriesController extends Component {

    use TableHeaderTrait;

    public function mount(): void{
        $this->traitMount(
            ['Id', 'Name', 'Slug','Category Name', 'Action'],
            ['id', 'name', 'slug']
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
        return view('livewire.sub-categories', [
            'subCategories' => $subCategories,
        ]);
    }
}
