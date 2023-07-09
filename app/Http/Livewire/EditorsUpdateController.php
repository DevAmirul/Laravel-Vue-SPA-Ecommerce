<?php

namespace App\Http\Livewire;

use App\Http\Traits\EditorsTraits;
use App\Models\Editor;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class EditorsUpdateController extends Component {
    use EditorsTraits;
    public int $editorsId;
    public string $selectedRole;
    public array $roleOption;
    public string $pageUrl = 'update';

    public function mount($id): void{
        $this->roleOption = ['Pending', 'Admin', 'Editor'];
        $this->editorsId  = $id;

        $editors            = Editor::find($this->editorsId, ['id', 'name', 'email', 'phone', 'city', 'address', 'role']);
        $this->name         = $editors->name;
        $this->email        = $editors->email;
        $this->phone        = $editors->phone;
        $this->city         = $editors->city;
        $this->address      = $editors->address;
        $this->selectedRole = $editors->role;
    }

    public function save() {
        $validate = $this->validate();

        isset($this->selectedRole) ? $validate['role']  = $this->selectedRole : null;
        !empty($this->password) ? $validate['password'] = Hash::make($this->password) : null;
        Editor::where('id', $this->editorsId)->update($validate);
        return redirect()->route('editors');
    }

    public function render() {
        return view('livewire.editors-update');
    }
}
