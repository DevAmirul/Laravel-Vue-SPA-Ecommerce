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
     *
     * @return void
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
     *
     * @param integer $contactId
     * @return RedirectResponse
     */
    public function update(int $contactId): RedirectResponse {
        return redirect()->route('contacts.reply', $contactId);
    }

    /**
     * Delete contact.
     *
     * @param integer $id
     * @return void
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
