<?php

namespace App\Http\Livewire;

use App\Http\ServiceTraits\EditorsService;
use App\Models\Editor;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class ProfileController extends Component
{
    use EditorsService;

    public string $pageUrl = 'update';

    function mount($id): void
    {
        $editor = Editor::firstWhere('id', $id);

        $this->editorId = $editor->id;
        $this->name = $editor->name;
        $this->email = $editor->email;
        $this->prevEmail = $editor->email;
        $this->phone = $editor->phone;
        $this->city = $editor->city;
        $this->role = $editor->role;
        $this->address = $editor->address;
        $this->state = $editor->state;
    }

    public function update()
    {
        $validate = $this->validate();

        Editor::where('id', $this->editorId)->update($validate);

        $this->dispatchBrowserEvent('success-toast', ['message' => 'Updated record!']);
    }

    /**
     * Delete the user's account.
     */
    public function destroy()
    {
        Editor::destroy($this->editorId);

        Auth::logout();

        session()->invalidate();
        session()->regenerateToken();

        return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.profile');
    }
}
