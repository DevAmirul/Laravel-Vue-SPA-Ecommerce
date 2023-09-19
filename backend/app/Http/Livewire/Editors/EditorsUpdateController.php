<?php

namespace App\Http\Livewire\Editors;

use App\Http\ServiceTraits\EditorsService;
use App\Models\Editor;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class EditorsUpdateController extends Component {
    use EditorsService;

    public string $pageUrl  = 'update';

    public function mount($id): void{
        $this->editorId    = $id;

        $editors              = Editor::findOrFail($this->editorId, ['id', 'name', 'email', 'phone', 'city', 'address', 'state', 'role', 'status']);

        $this->name           = $editors->name;
        $this->email          = $editors->email;
        $this->phone          = $editors->phone;
        $this->city           = $editors->city;
        $this->address        = $editors->address;
        $this->state          = $editors->state;
        $this->selectedRole   = $editors->role;
        $this->selectedStatus = $editors->status;
    }

    public function update() {
        $validate = $this->validate();

        if (isset($this->selectedRole)) $validate['role']     = $this->selectedRole;
        if (isset($this->selectedStatus)) $validate['status'] = $this->selectedStatus;
        if (!empty($this->password)) $validate['password']    = Hash::make($this->password) ;

        Editor::whereId($this->editorId)->update($validate);

        $this->dispatchBrowserEvent('success-toast', ['message' => 'Updated record!']);
    }

    public function render() {
        return view('livewire.editors.editors-update');
    }
}
