<?php

namespace App\Http\Livewire\Editors;

use App\Http\Traits\TableHeaderTrait;
use App\Models\Editor;
use Livewire\Component;

class EditorsController extends Component {
    use TableHeaderTrait;

    public array $status;
    public array $role;
    public array $booleanColNames;
    public array $booleanAttributes;

    public function mount(): void{
        $this->booleanAttributes = [
            ['Editor', 'Admin'],
            ['Pending', 'Allow'],
        ];
        $this->booleanColNames = ['role','status'];

        $this->traitMount(
            ['Id', 'Name', 'Email', 'Phone', 'City', 'Role', 'Status', 'Action'],
            ['id', 'name', 'email', 'phone', 'city', 'role', 'status']
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
