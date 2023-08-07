<?php

namespace App\Http\Livewire\Contacts;

use App\Http\ServiceTraits\ContactsService;
use App\Models\ContactUs;
use Livewire\Component;

class ContactUsReplyController extends Component {
    use ContactsService;

    public function mount($id): void{
        $this->contactId = $id;

        $contact       = ContactUs::find($id, ['name', 'email', 'subject', 'message']);
        $this->name    = $contact->name;
        $this->email   = $contact->email;
        $this->subject = $contact->subject;
        $this->message = $contact->message;
    }

    public function reply() {
        // TODO: send mail here.
    }

    public function save() {
        $this->validate();
        ContactUs::whereId($this->contactId)->update(['status' => 1]);
        return redirect()->route('contacts');
    }

    public function render() {
        return view('livewire.contacts.contact-us-replay');
    }
}
