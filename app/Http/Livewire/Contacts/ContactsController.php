<?php

namespace App\Http\Livewire\Contacts;

use App\Http\Traits\TableHeaderTrait;
use App\Models\Contact;
use Livewire\Component;

class ContactsController extends Component {
    use TableHeaderTrait;

    public array $status;

    public function mount(): void{
        $this->status = ['No Replied', 'Replied'];
        $this->traitMount(
            ['Id', 'Name', 'Email', 'Phone', 'Subject', 'Replied Status','Action'],
            ['id', 'name', 'email', 'phone', 'subject', 'status']
        );
    }
    public function update($contactId) {
        return redirect()->route('contacts.reply', $contactId);
    }

    public function render() {
        $contacts = Contact::where('name', 'LIKE', '%' . $this->searchStr . '%')
            ->paginate($this->showDataPerPage, [...$this->tableDataColumnNames]);
        return view('livewire.contacts.contacts', [
            'contacts' => $contacts,
        ]);
    }
}
