<?php

namespace App\Http\Livewire\Settings\Shipping;

use App\Http\Traits\TableColumnTrait;
use App\Models\ShippingMethod;
use Livewire\Component;
use Livewire\WithPagination;

class MethodsController extends Component {
    use WithPagination, TableColumnTrait;

    public function mount(): void{
        $this->tableColumnTrait(
            ['Id', 'Name', 'Cost', 'Action'],
            ['id', 'name', 'cost']
        );
    }

    public function update($offerId) {
        return redirect()->route('settings.shippingMethods.update', $offerId);
    }

    public function destroy($id): int {
        return ShippingMethod::destroy($id);
    }

    public function render() {
        $methods = ShippingMethod::where('name', 'LIKE', '%' . $this->searchStr . '%')
            ->paginate($this->showDataPerPage, [...$this->tableDataColumnNames]);

        return view('livewire.settings.shipping.methods', [
            'methods' => $methods,
        ]);
    }
}
