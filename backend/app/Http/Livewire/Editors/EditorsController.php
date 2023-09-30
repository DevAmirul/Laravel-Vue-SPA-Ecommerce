<?php

namespace App\Http\Livewire\Editors;

use App\Http\Traits\BooleanTableTrait;
use App\Http\Traits\TableColumnTrait;
use App\Models\Editor;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class EditorsController extends Component {
    use TableColumnTrait, BooleanTableTrait, WithPagination;

    /**
     * Set table column.
     */
    public function mount(): void {
        $this->tableColumnTrait(
            ['Id', 'Name', 'Email', 'Phone', 'City', 'Role', 'Status', 'Action'],
            ['id', 'name', 'email', 'phone', 'city', 'role', 'status']
        );
        $this->booleanTrait(
            ['role', 'status'],
            [['Editor', 'Admin'], ['Pending', 'Allow']],
            [
                ['badge text-bg-info', 'badge text-bg-success'],
                ['badge text-bg-warning', 'badge text-bg-primary'],
            ]
        );
    }

    /**
     * Redirect to update controller.
     */
    public function update(int $editorId) {
        return redirect()->route('editors.update', $editorId);
    }

    /**
     * Delete editor.
     */
    public function destroy(int $id): void {
        Editor::destroy($id);
        $this->dispatchBrowserEvent('success-toast', ['message' => 'Deleted record!']);
    }

    public function render(): View {
        $editors = Editor::where('name', 'LIKE', '%' . $this->searchStr . '%')
            ->paginate($this->showDataPerPage, [...$this->tableDataColumnNames]);

        return view('livewire.editors.editors', [
            'editors' => $editors,
        ]);
    }
}
