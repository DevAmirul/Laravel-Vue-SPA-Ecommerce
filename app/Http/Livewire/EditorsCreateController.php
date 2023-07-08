<?php

namespace App\Http\Livewire;

use App\Http\Traits\EditorsTraits;
use App\Models\Editor;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class EditorsCreateController extends Component {
    use EditorsTraits;

    public string $pageUrl = 'create';

    public function save(): bool{
        $validate             = $this->validate();
        $validate['password'] = Hash::make($validate['password']);
        Editor::create($validate);
        $this->reset();
        return true;
    }

    public function render() {
        return view('livewire.editors-create');
    }
}
