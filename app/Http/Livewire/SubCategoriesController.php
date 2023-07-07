<?php

namespace App\Http\Livewire;

use App\Http\Traits\TableHeaderTrait;
use App\Models\SubCategory;
use Livewire\Component;

class SubCategoriesController extends Component {

    use TableHeaderTrait;

    public function mount(): void{
        $this->traitMount(
            ['Id', 'Name', 'Slug'],
            ['id', 'name', 'slug']
        );
    }

    public function update($subCategoryId) {
        return redirect()->route('subCategories.update', $subCategoryId);
    }

    public function render() {
        $subCategories = SubCategory::where('name', 'LIKE', '%' . $this->searchStr . '%')
            ->paginate($this->showDataPerPage, [...$this->tableDataColumnNames]);
        return view('livewire.sub-categories', [
            'subCategories' => $subCategories,
        ]);
    }
}
