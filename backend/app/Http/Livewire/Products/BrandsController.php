<?php

namespace App\Http\Livewire\Products;

use App\Http\Traits\BooleanTableTrait;
use App\Http\Traits\TableColumnTrait;
use App\Models\Brand;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class BrandsController extends Component {
    use WithPagination, TableColumnTrait, BooleanTableTrait;

    /**
     * Set table column.
     */
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

    /**
     * Redirect to update controller.
     */
    public function update(int $brandId) {
        return redirect()->route('brands.update', $brandId);
    }

    /**
     * Delete brand.
     */
    public function destroy(int $id): void {
        $brand = Brand::findOrFail($id);

        $this->fileDestroy($brand->image, 'brands');

        $brand->delete();

        $this->dispatchBrowserEvent('success-toast', ['message' => 'deleted record!']);
    }

    public function render(): View {
        $brands = Brand::where('name', 'LIKE', '%' . $this->searchStr . '%')
            ->paginate($this->showDataPerPage, [...$this->tableDataColumnNames]);

        return view('livewire.products.brands', [
            'brands' => $brands,
        ]);
    }
}