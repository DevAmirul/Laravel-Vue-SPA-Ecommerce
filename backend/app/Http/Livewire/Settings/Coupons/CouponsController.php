<?php

namespace App\Http\Livewire\Settings\Coupons;

use App\Http\Traits\BooleanTableTrait;
use App\Http\Traits\TableColumnTrait;
use App\Models\Coupon;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class CouponsController extends Component {
    use WithPagination, TableColumnTrait, BooleanTableTrait;

    /**
     * Set table column.
     */
    public function mount(): void {
        $this->tableColumnTrait(
            ['Id', 'Name', 'Discount', 'Code', 'Status', 'Start Date', 'Expire Date', 'Action'],
            ['id', 'name', 'discount', 'code', 'status', 'start_date', 'expire_date']
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
        return redirect()->route('settings.coupons.update', $brandId);
    }

    /**
     * Delete coupon.
     */
    public function destroy(int $id): void {
        Coupon::destroy($id);
        $this->dispatchBrowserEvent('success-toast', ['message' => 'Deleted record!']);
    }

    public function render(): View {
        $coupons = Coupon::where('name', 'LIKE', '%' . $this->searchStr . '%')
            ->paginate($this->showDataPerPage, [...$this->tableDataColumnNames]);

        return view('livewire.settings.coupons.coupons', [
            'coupons' => $coupons,
        ]);
    }
}
