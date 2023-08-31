<?php

namespace App\Http\Livewire\Categories;

use App\Http\Traits\BooleanTableTrait;
use App\Http\Traits\TableColumnTrait;
use App\Models\Section;
use Livewire\Component;
use Livewire\WithPagination;

class SectionsController extends Component {
    use TableColumnTrait, BooleanTableTrait, WithPagination;

    public function mount(): void{
        $this->tableColumnTrait(
            ['Id', 'image', 'Name', 'Slug', 'status', 'Action'],
            ['id', 'image', 'name', 'slug', 'status']
        );
        $this->booleanTrait(
            ['status'],
            [['Unpublish', 'Publish']],
            [['badge text-bg-warning', 'badge text-bg-primary']]
        );
    }

    public function update($sectionId) {
        return redirect()->route('sections.update', $sectionId);
    }

    public function destroy($id): void{
        $section = Section::find($id);
        $this->fileDestroy($section->image, 'sections');
        $section->delete();
        $this->dispatchBrowserEvent('success-toast', ['message' => 'deleted record!']);
    }

    public function render() {
        $sections = Section::where('name', 'LIKE', '%' . $this->searchStr . '%')
            ->paginate($this->showDataPerPage, [...$this->tableDataColumnNames]);

        return view('livewire.categories.sections', [
            'sections' => $sections,
        ]);
    }
}
