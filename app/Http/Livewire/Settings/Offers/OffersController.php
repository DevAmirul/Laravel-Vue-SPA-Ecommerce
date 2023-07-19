<?php

namespace App\Http\Livewire\Settings\Offers;

use App\Http\Traits\TableHeaderTrait;
use App\Models\Offer;
use Livewire\Component;
use Livewire\WithPagination;

class OffersController extends Component {
    use WithPagination, TableHeaderTrait;

    public array $booleanColNames;
    public array $booleanAttributes;

    public function mount(): void{
        $this->booleanAttributes = [
            ['Unpublish', 'Publish'],
        ];
        $this->booleanColNames = ['status'];

        $this->traitMount(
            ['Id', 'Title', 'Type', 'Discount', 'Status', 'Start Date', 'Expire Date', 'Action'],
            ['id', 'title', 'type', 'discount', 'status', 'start_date', 'expire_date']
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

        return view('livewire.settings.offers.offers',[
            'offers'=> $offers
        ]);
    }
}
