<?php

namespace App\Http\Livewire\Editors;

use App\Http\ServiceTraits\EditorsService;
use App\Http\Traits\EditorsTraits;
use App\Models\Editor;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class EditorsCreateController extends Component {
    use EditorsService;

    public string $pageUrl = 'create';

    public function save(): bool{
        $validate             = $this->validate();
        $validate['password'] = Hash::make($validate['password']);
        Editor::create($validate);
        $this->propertyResetExcept();
        return true;
    }

    public function render() {
        return view('livewire.editors.editors-create');
    }
}
