<?php

namespace App\Http\Livewire\Products;

use App\Http\Traits\BooleanTrait;
use App\Http\Traits\TableColumnTrait;
use App\Models\Brand;
use Livewire\Component;
use Livewire\WithPagination;

class BrandsController extends Component {
    use WithPagination, TableColumnTrait, BooleanTrait;

    public function mount(): void{
        $this->tableColumnTrait(
            ['Id', 'Image', 'Name', 'Slug', 'Status', 'Action'],
            ['id', 'image', 'name', 'slug', 'status']
        );
        $this->booleanTrait(
            ['status'],
            [['Unpublish', 'Publish']],
            [['badge text-bg-warning', 'badge text-bg-primary']]
        );
    }

    public function update($brandId) {
        return redirect()->route('brands.update', $brandId);
    }

    public function destroy($id): int {
        return Brand::destroy($id);
    }

    public function render() {
        $brands = Brand::where('name', 'LIKE', '%' . $this->searchStr . '%')
            ->paginate($this->showDataPerPage, [...$this->tableDataColumnNames]);

        return view('livewire.products.brands', [
            'brands' => $brands,
        ]);
    }
}
