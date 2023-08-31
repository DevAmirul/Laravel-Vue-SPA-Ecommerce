<?php

namespace App\Http\Livewire\Products;

use App\Http\Traits\BooleanTableTrait;
use App\Http\Traits\TableColumnTrait;
use App\Models\Brand;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class BrandsController extends Component {
    use WithPagination, TableColumnTrait, BooleanTableTrait;

    public function mount(): void {
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

    public function destroy($id): void {
        $brand = Brand::find($id);
        $this->fileDestroy($brand->image, 'brands');
        $brand->delete();
        $this->dispatchBrowserEvent('success-toast', ['message' => 'deleted record!']);
    }

    public function render() {
        $brands = Brand::where('name', 'LIKE', '%' . $this->searchStr . '%')
            ->paginate($this->showDataPerPage, [...$this->tableDataColumnNames]);
        return view('livewire.products.brands', [
            'brands' => $brands,
        ]);
    }
}