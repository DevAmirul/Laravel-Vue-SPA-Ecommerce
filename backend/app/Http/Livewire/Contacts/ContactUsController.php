<?php

namespace App\Http\Livewire\Contacts;

use App\Http\Traits\BooleanTableTrait;
use App\Http\Traits\TableColumnTrait;
use App\Models\ContactUs;
use Livewire\Component;
use Livewire\WithPagination;

class ContactUsController extends Component {
    use TableColumnTrait, BooleanTableTrait, WithPagination;

    public function mount(): void{
        $this->tableColumnTrait(
            ['Id', 'Name', 'Email', 'Subject', 'Replied Status', 'Action'],
            ['id', 'name', 'email', 'subject', 'status']
        );
        $this->booleanTrait(
            ['status'],
            [['No Reply', 'Replied']],
            [['badge text-bg-info', 'badge text-bg-success']]
        );
    }
    public function update($contactId) {
        return redirect()->route('contacts.reply', $contactId);
    }

    public function destroy($id): int {
        return ContactUs::destroy($id);
    }

    public function render() {
        $contacts = ContactUs::where('name', 'LIKE', '%' . $this->searchStr . '%')
            ->paginate($this->showDataPerPage, [...$this->tableDataColumnNames]);
            
        return view('livewire.contacts.contact-us', [
            'contacts' => $contacts,
        ]);
    }
}
