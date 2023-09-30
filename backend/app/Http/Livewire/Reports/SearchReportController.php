<?php

namespace App\Http\Livewire\Reports;

use App\Http\Traits\TableColumnTrait;
use App\Models\SearchedKeyword;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class SearchReportController extends Component {
    use TableColumnTrait, WithPagination;

    /**
     * Set table column.
     */
    public function mount(): void {
        $this->tableColumnTrait(
            ['Keyword', 'Hits'],
            ['keyword', 'hits']
        );
    }

    public function render(): View {
        $keywordReports = SearchedKeyword::where('keyword', 'LIKE', '%' . $this->searchStr . '%')
            ->paginate($this->showDataPerPage, [...$this->tableDataColumnNames]);

        return view('livewire.reports.search-report', [
            'keywordReports' => $keywordReports,
        ]);
    }
}
