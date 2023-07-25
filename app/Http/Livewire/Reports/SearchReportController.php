<?php

namespace App\Http\Livewire\Reports;

use App\Http\Traits\TableHeaderTrait;
use App\Models\SearchedKeyword;
use Livewire\Component;
use Livewire\WithPagination;

class SearchReportController extends Component {
    use TableHeaderTrait, WithPagination;

    public function mount(): void{
        $this->traitMount(
            ['Keyword', 'Hits'],
            ['keyword', 'hits']
        );
    }

    public function render() {
        $keywords = SearchedKeyword::where('keyword', 'LIKE', '%' . $this->searchStr . '%')
            ->paginate($this->showDataPerPage, [...$this->tableDataColumnNames]);

        return view('livewire.reports.search-report', [
            'keywords' => $keywords,
        ]);
    }
}
