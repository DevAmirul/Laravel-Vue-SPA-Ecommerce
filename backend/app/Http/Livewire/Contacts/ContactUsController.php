<?php

namespace App\Http\Livewire\Contacts;

use App\Http\Traits\BooleanTableTrait;
use App\Http\Traits\TableColumnTrait;
use App\Models\ContactUs;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class ContactUsController extends Component {
    use TableColumnTrait, BooleanTableTrait, WithPagination;

    /**
     * Set table column.
     */
    public function mount(): void {
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

    /**
     * Redirect to update controller.
     */
    public function update(int $contactId) {
        return redirect()->route('contacts.reply', $contactId);
    }

    /**
     * Delete contact.
     */
    public function destroy(int $id): void {
        ContactUs::destroy($id);
        $this->dispatchBrowserEvent('success-toast', ['message' => 'Deleted record!']);
    }

    public function render(): View {
        $contacts = ContactUs::where('name', 'LIKE', '%' . $this->searchStr . '%')
            ->paginate($this->showDataPerPage, [...$this->tableDataColumnNames]);

        return view('livewire.contacts.contact-us', [
            'contacts' => $contacts,
        ]);
    }
}
