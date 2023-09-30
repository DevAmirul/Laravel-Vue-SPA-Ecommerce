<?php

namespace App\Http\Livewire\Products;

use App\Http\Traits\TableColumnTrait;
use App\Models\Tag;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class TagsController extends Component {
    use WithPagination, TableColumnTrait;

    /**
     * Set table column.
     */
    public function mount(): void {
        $this->tableColumnTrait(
            ['Id', 'Keyword', 'Action'],
            ['id', 'keyword']
        );
    }

    /**
     * Delete tag.
     */
    public function destroy(int $id): void {
        Tag::destroy($id);
        $this->dispatchBrowserEvent('success-toast', ['message' => 'Deleted record!']);
    }

    public function render(): View {
        $tags = Tag::where('keyword', 'LIKE', '%' . $this->searchStr . '%')
            ->paginate($this->showDataPerPage);

        return view('livewire.products.tags', [
            'tags' => $tags,
        ]);
    }
}
