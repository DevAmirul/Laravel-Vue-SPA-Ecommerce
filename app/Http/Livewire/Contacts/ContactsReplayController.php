<?php

namespace App\Http\Livewire\Contacts;

use App\Models\Contact;
use Livewire\Component;

class ContactsReplayController extends Component {
    public int $contactId;
    public string $name;
    public string $email;
    public string $subject;
    public string $message;

    public function mount($id) : void {
        $this->contactId = $id;

        $contact = Contact::find($id,['name','email','subject','message']);
        $this->name = $contact->name;
        $this->email = $contact->email;
        $this->subject = $contact->subject;
    }

    public function reply(){

    }

    public function render() {
        return view('livewire.contacts.contacts-replay');
    }
}
// TODO: ide setup;