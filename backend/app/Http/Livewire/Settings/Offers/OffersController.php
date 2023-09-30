<?php

namespace App\Http\Livewire\Settings\Offers;

use App\Http\Traits\BooleanTableTrait;
use App\Http\Traits\TableColumnTrait;
use App\Models\Offer;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class OffersController extends Component {
    use WithPagination, TableColumnTrait, BooleanTableTrait;

    /**
     * Set table column.
     */
    public function mount(): void {
        $this->tableColumnTrait(
            ['Id', 'Name', 'Type', 'Discount', 'Status', 'Start Date', 'Expire Date', 'Action'],
            ['id', 'name', 'type', 'discount', 'status', 'start_date', 'expire_date']
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
    public function update(int $offerId) {
        return redirect()->route('settings.offers.update', $offerId);
    }

    /**
     * Delete offer.
     */
    public function destroy(int $id): void {
        Offer::destroy($id);
        $this->dispatchBrowserEvent('success-toast', ['message' => 'Deleted record!']);
    }

    public function render(): View {
        $offers = Offer::where('name', 'LIKE', '%' . $this->searchStr . '%')
            ->paginate($this->showDataPerPage, [...$this->tableDataColumnNames]);

        return view('livewire.settings.offers.offers', [
            'offers' => $offers,
        ]);
    }
}
