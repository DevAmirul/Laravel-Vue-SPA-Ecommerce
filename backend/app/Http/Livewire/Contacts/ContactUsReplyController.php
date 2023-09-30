<?php

namespace App\Http\Livewire\Contacts;

use App\Http\ServiceTraits\ContactsService;
use App\Mail\Replay;
use App\Models\ContactUs;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use Livewire\Component;

class ContactUsReplyController extends Component {
    use ContactsService;

    /**
     * Get contact's by id.
     */
    public function mount(int $id): void {
        $this->contactId = $id;

        $contact = ContactUs::findOrFail($id, ['name', 'email', 'subject', 'message']);

        $this->name    = $contact->name;
        $this->email   = $contact->email;
        $this->subject = $contact->subject;
        $this->message = $contact->message;
    }

    /**
     * Reply contact.
     */
    public function reply(): void {
        $validate = $this->validate();

        ContactUs::whereId($this->contactId)->update(['status' => true]);

        Mail::to($this->email)->send(new Replay($validate));

        $this->dispatchBrowserEvent('success-toast', ['message' => 'deleted record!']);
    }

    public function render(): View {
        return view('livewire.contacts.contact-us-replay');
    }
}
