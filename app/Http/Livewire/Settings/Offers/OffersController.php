<?php

namespace App\Http\Livewire\Settings\Offers;

use App\Http\Traits\BooleanTrait;
use App\Http\Traits\TableColumnTrait;
use App\Models\Offer;
use Livewire\Component;
use Livewire\WithPagination;

class OffersController extends Component {
    use WithPagination, TableColumnTrait, BooleanTrait;

    public function mount(): void{
        $this->tableColumnTrait(
            ['Id', 'Title', 'Type', 'Discount', 'Status', 'Start Date', 'Expire Date', 'Action'],
            ['id', 'title', 'type', 'discount', 'status', 'start_date', 'expire_date']
        );
        $this->booleanTrait(
            ['status'],
            [['Unpublish', 'Publish']],
            [['badge text-bg-warning', 'badge text-bg-primary']]
        );
    }

    public function update($offerId) {
        return redirect()->route('settings.offers.update', $offerId);
    }

    public function destroy($id): int {
        return Offer::destroy($id);
    }

    public function render() {
        $offers = Offer::where('title', 'LIKE', '%' . $this->searchStr . '%')
            ->paginate($this->showDataPerPage, [...$this->tableDataColumnNames]);

        return view('livewire.settings.offers.offers', [
            'offers' => $offers,
        ]);
    }
}
