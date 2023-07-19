<?php

namespace App\Http\Livewire\Products;

use App\Http\Traits\TableHeaderTrait;
use App\Models\Tag;
use Livewire\Component;
use Livewire\WithPagination;

class TagsController extends Component {
    use WithPagination, TableHeaderTrait;

    public array $booleanColNames;
    public array $booleanAttributes;

    public function mount(): void{
        $this->traitMount(
            ['Id', 'Keyword', 'Action'],
            ['id', 'keyword']
        );
    }

    public function update($tagId) {
        return redirect()->route('brands.update', $tagId);
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
