<?php

namespace App\Http\Livewire\Categories;

use App\Http\Traits\BooleanTableTrait;
use App\Http\Traits\TableColumnTrait;
use App\Models\Section;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class SectionsController extends Component {
    use TableColumnTrait, BooleanTableTrait, WithPagination;

    /**
     * Set table column.
     *
     * @return void
     */
    public function mount(): void {
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

    /**
     * Redirect to update controller.
     *
     * @param integer $sectionId
     * @return RedirectResponse
     */
    public function update(int $sectionId): RedirectResponse {
        return redirect()->route('sections.update', $sectionId);
    }

    /**
     * Delete section.
     *
     * @param integer $id
     * @return void
     */
    public function destroy(int $id): void {
        $section = Section::findOrFail($id);

        $this->fileDestroy($section->image, 'sections');

        $section->delete();

        $this->dispatchBrowserEvent('success-toast', ['message' => 'deleted record!']);
    }

    public function render(): View {
        $sections = Section::where('name', 'LIKE', '%' . $this->searchStr . '%')
            ->paginate($this->showDataPerPage, [...$this->tableDataColumnNames]);

        return view('livewire.categories.sections', [
            'sections' => $sections,
        ]);
    }
}
