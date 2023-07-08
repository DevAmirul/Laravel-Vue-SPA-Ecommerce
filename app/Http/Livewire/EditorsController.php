<?php

namespace App\Http\Livewire;

use App\Http\Traits\TableHeaderTrait;
use App\Models\Editor;
use Livewire\Component;

class EditorsController extends Component {
    use TableHeaderTrait;

    public array $status;

    public function mount(): void{
        $this->status = ['Editor', 'Admin', 'Pending'];
        $this->traitMount(
            ['Id', 'Name', 'Email', 'Phone', 'City', 'Role', 'Action'],
            ['id', 'name', 'email', 'phone', 'city', 'role']
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
        return view('livewire.editors', [
            'editors' => $editors,
        ]);
    }
}
