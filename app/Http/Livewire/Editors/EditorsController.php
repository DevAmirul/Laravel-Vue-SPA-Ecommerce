<?php

namespace App\Http\Livewire\Editors;

use App\Http\Traits\BooleanTrait;
use App\Http\Traits\TableColumnTrait;
use App\Models\Editor;
use Livewire\Component;

class EditorsController extends Component {
    use TableColumnTrait, BooleanTrait;

    public function mount(): void{
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
    public function update($editorId) {
        return redirect()->route('editors.update', $editorId);
    }

    public function destroy($id): int {
        return Editor::destroy($id);
    }

    public function render() {
        $editors = Editor::where('name', 'LIKE', '%' . $this->searchStr . '%')
            ->paginate($this->showDataPerPage, [...$this->tableDataColumnNames]);
        return view('livewire.editors.editors', [
            'editors' => $editors,
        ]);
    }
}
