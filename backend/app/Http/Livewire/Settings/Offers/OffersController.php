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
     *
     * @return void
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
     *
     * @param integer $offerId
     * @return RedirectResponse
     */
    public function update(int $offerId): RedirectResponse {
        return redirect()->route('settings.offers.update', $offerId);
    }

    /**
     * Delete offer.
     *
     * @param integer $id
     * @return void
     */
    public function destroy(int $id): int {
        return Offer::destroy($id);
    }

    public function render(): View {
        $offers = Offer::where('name', 'LIKE', '%' . $this->searchStr . '%')
            ->paginate($this->showDataPerPage, [...$this->tableDataColumnNames]);

        return view('livewire.settings.offers.offers', [
            'offers' => $offers,
        ]);
    }
}
