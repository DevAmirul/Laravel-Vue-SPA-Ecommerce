<?php

namespace App\Http\Livewire\Contacts;

use App\Models\ContactUs;
use Livewire\Component;

class ContactUsReplyController extends Component {
    public int $contactId;
    public string $name;
    public string $email;
    public string $subject;
    public string $message;
    public string $repliedSubject;
    public string $repliedMessage;

    protected $rules = [
        'repliedSubject' => 'required|string|max:255',
        'repliedMessage' => 'required|string',
    ];

    public function updated($propertyName): void{
        $this->validateOnly($propertyName, $this->rules);
    }

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
// TODO: ide setup;