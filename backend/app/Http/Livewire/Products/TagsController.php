<?php

namespace App\Http\Livewire\Products;

use App\Http\Traits\TableColumnTrait;
use App\Models\Tag;
use Livewire\Component;
use Livewire\WithPagination;

class TagsController extends Component {
    use WithPagination, TableColumnTrait;

    public function mount(): void{
        $this->tableColumnTrait(
            ['Id', 'Keyword', 'Action'],
            ['id', 'keyword']
        );
    }

    public function destroy($id): int {
        return Tag::destroy($id);
    }

    public function render() {
        $tags = Tag::where('keyword', 'LIKE', '%' . $this->searchStr . '%')
            ->paginate($this->showDataPerPage);
        return view('livewire.products.tags', [
            'tags' => $tags,
        ]);
    }
}
