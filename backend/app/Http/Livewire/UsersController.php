<?php

namespace App\Http\Livewire;

use App\Http\Traits\TableColumnTrait;
use App\Models\User;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class UsersController extends Component {
    use WithPagination, TableColumnTrait;

    /**
     * Get all user list.
     */
    public function mount(): void {
        $this->tableColumnTrait(
            ['Id', 'Name', 'Email'],
            ['id', 'name', 'email']
        );
    }

    public function render(): View {
        $users = User::where('name', 'LIKE', '%' . $this->searchStr . '%')
            ->paginate($this->showDataPerPage, [...$this->tableDataColumnNames]);

        return view('livewire.users', [
            'users' => $users,
        ]);
    }
}
