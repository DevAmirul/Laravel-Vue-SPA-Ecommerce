<?php

namespace App\Http\Livewire\Editors;

use App\Http\Traits\EditorsTraits;
use App\Models\Editor;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class EditorsUpdateController extends Component {
    use EditorsTraits;

    public int $editorsId;
    public int $selectedRole;
    public array $roleOption;
    public int $selectedStatus;
    public array $statusOption;
    public string $pageUrl = 'update';

    public function mount($id): void{
        $this->roleOption   = ['Editor', 'Admin'];
        $this->statusOption = ['pending', 'Allow'];
        $this->editorsId    = $id;

        $editors              = Editor::find($this->editorsId, ['id', 'name', 'email', 'phone', 'city', 'address', 'state', 'role', 'status']);
        $this->name           = $editors->name;
        $this->email          = $editors->email;
        $this->phone          = $editors->phone;
        $this->city           = $editors->city;
        $this->address        = $editors->address;
        $this->state          = $editors->state;
        $this->selectedRole   = $editors->role;
        $this->selectedStatus = $editors->status;
    }

    public function save() {
        $validate = $this->validate();

        isset($this->selectedRole) ? $validate['role']   = $this->selectedRole : null;
        isset($this->selectedStatus) ? $validate['status'] = $this->selectedStatus : null;
        !empty($this->password) ? $validate['password']  = Hash::make($this->password) : null;
        Editor::where('id', $this->editorsId)->update($validate);
        return redirect()->route('editors');
    }

    public function render() {
        return view('livewire.editors.editors-update');
    }
}
