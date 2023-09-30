<?php

namespace App\Http\Livewire\Settings\Shipping;

use App\Http\Traits\TableColumnTrait;
use App\Models\ShippingMethod;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class MethodsController extends Component {
    use WithPagination, TableColumnTrait;

    /**
     * Set table column.
     */
    public function mount(): void {
        $this->tableColumnTrait(
            ['Id', 'Name', 'Cost', 'Action'],
            ['id', 'name', 'cost']
        );
    }

    /**
     * Redirect to update controller.
     */
    public function update(int $methodId) {
        return redirect()->route('settings.shippingMethods.update', $methodId);
    }

    /**
     * Delete shipping method.
     */
    public function destroy(int $id): void {
        ShippingMethod::destroy($id);
        $this->dispatchBrowserEvent('success-toast', ['message' => 'Deleted record!']);
    }

    public function render(): View {
        $methods = ShippingMethod::where('name', 'LIKE', '%' . $this->searchStr . '%')
            ->paginate($this->showDataPerPage, [...$this->tableDataColumnNames]);

        return view('livewire.settings.shipping.methods', [
            'methods' => $methods,
        ]);
    }
}
