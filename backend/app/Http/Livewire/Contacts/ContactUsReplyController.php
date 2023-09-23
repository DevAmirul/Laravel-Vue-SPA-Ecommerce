<?php

namespace App\Http\Livewire\Contacts;

use App\Http\ServiceTraits\ContactsService;
use App\Mail\Replay;
use App\Models\ContactUs;
use App\Repositories\Payments\StripeRepository;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use App\Interfaces\Payments;


class ContactUsReplyController extends Component {
    use ContactsService;

    public function mount($id): void{
        $this->contactId = $id;

        $contact       = ContactUs::findOrFail($id, ['name', 'email', 'subject', 'message']);

        $this->name    = $contact->name;
        $this->email   = $contact->email;
        $this->subject = $contact->subject;
        $this->message = $contact->message;
    }

    public function reply() {
        $validate = $this->validate();

        ContactUs::whereId($this->contactId)->update(['status' => true]);

        Mail::to($this->email)->send(new Replay($validate));

        $this->dispatchBrowserEvent('success-toast', ['message' => 'deleted record!']);
    }

    public function render() {
        return view('livewire.contacts.contact-us-replay');
    }
}
