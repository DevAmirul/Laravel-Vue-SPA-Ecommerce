<?php

namespace App\Http\Livewire\Settings\Coupons;

use App\Http\Traits\BooleanTableTrait;
use App\Http\Traits\TableColumnTrait;
use App\Models\Coupon;
use Livewire\Component;
use Livewire\WithPagination;

class CouponsController extends Component {
    use WithPagination, TableColumnTrait, BooleanTableTrait;

    public function mount(): void{
        $this->tableColumnTrait(
            ['Id', 'Title', 'Discount', 'Type', 'Code', 'Status', 'Start Date', 'Expire Date', 'Action'],
            ['id', 'title', 'discount', 'type', 'code', 'status', 'start_date', 'expire_date']
        );
        $this->booleanTrait(
            ['status'],
            [['Unpublish', 'Publish']],
            [['badge text-bg-warning', 'badge text-bg-primary']]
        );
    }

    public function update($brandId) {
        return redirect()->route('settings.coupons.update', $brandId);
    }

    public function destroy($id): int {
        return Coupon::destroy($id);
    }

    public function render() {
        $coupons = Coupon::where('title', 'LIKE', '%' . $this->searchStr . '%')
            ->paginate($this->showDataPerPage, [...$this->tableDataColumnNames]);
            
        return view('livewire.settings.coupons.coupons', [
            'coupons' => $coupons,
        ]);
    }
}
