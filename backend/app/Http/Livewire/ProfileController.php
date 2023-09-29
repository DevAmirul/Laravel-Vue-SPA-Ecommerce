<?php

namespace App\Http\Livewire;

use App\Http\ServiceTraits\EditorsService;
use App\Models\Editor;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;
use Livewire\Component;

class ProfileController extends Component {
    use EditorsService;

    public string $pageUrl = 'update';

    /**
     * Get editor's by id.
     *
     * @param integer $id
     * @return void
     */
    function mount(int $id): void {
        $editor = Editor::firstWhere('id', $id);

        $this->editorId  = $editor->id;
        $this->name      = $editor->name;
        $this->email     = $editor->email;
        $this->prevEmail = $editor->email;
        $this->phone     = $editor->phone;
        $this->city      = $editor->city;
        $this->role      = $editor->role;
        $this->address   = $editor->address;
        $this->state     = $editor->state;

        if (!Gate::allows('isAuthenticateEditor', $this->editorId)) abort(403);
    }

    /**
     * Update editor's profile.
     *
     * @return void
     */
    public function update(): void {
        if (!Gate::allows('isAuthenticateEditor', $this->editorId)) abort(403);

        $validate = $this->validate();

        Editor::whereId($this->editorId)->update($validate);

        $this->dispatchBrowserEvent('success-toast', ['message' => 'Updated record!']);
    }

    /**
     * Delete the editor's account.
     *
     * @return RedirectResponse
     */
    public function destroy(): RedirectResponse {
        Editor::destroy($this->editorId);

        Auth::logout();

        session()->invalidate();
        session()->regenerateToken();

        return redirect()->route('login');
    }

    public function render(): View {
        return view('livewire.profile');
    }
}
