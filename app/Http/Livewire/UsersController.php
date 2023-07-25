<?php

namespace App\Http\Livewire;

use App\Http\Traits\EnumTrait;
use App\Http\Traits\TableColumnTrait;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersController extends Component {
    use WithPagination, TableColumnTrait, EnumTrait;

    public function mount(): void{

        $this->tableColumnTrait(
            ['Id', 'Name', 'Email', 'Gender'],
            ['id', 'name', 'email', 'gender']
        );
        $this->enumTrait(
            ['gender'], [['male', 'female']],
            [['badge text-bg-primary', 'badge text-bg-info']]
        );
    }

    public function render() {
        $users = User::where('name', 'LIKE', '%' . $this->searchStr . '%')
            ->paginate($this->showDataPerPage, [...$this->tableDataColumnNames]);

        return view('livewire.users', [
            'users' => $users,
        ]);
    }
}
