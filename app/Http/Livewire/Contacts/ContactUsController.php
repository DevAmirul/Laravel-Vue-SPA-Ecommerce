<?php

namespace App\Http\Livewire\Contacts;

use App\Http\Traits\TableHeaderTrait;
use App\Models\ContactUs;
use Livewire\Component;
use Livewire\WithPagination;

class ContactUsController extends Component {
    use TableHeaderTrait, WithPagination;

    public array $booleanColNames;
    public array $booleanAttributes;
    public array $booleanClass = [
        ['badge text-bg-info', 'badge text-bg-success'],
    ];

    public function mount(): void{
        $this->booleanAttributes = [
            ['No Reply', 'Reply'],
        ];
        $this->booleanColNames = ['status'];
        $this->traitMount(
            ['Id', 'Name', 'Email', 'Subject', 'Replied Status', 'Action'],
            ['id', 'name', 'email', 'subject', 'status']
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
