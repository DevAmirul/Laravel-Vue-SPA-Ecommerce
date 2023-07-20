<?php

namespace App\Http\Livewire;

use App\Http\Traits\TableHeaderTrait;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersController extends Component {
    use WithPagination, TableHeaderTrait;

    public array $enumAttributes;
    public array $enumColNames;
    public array $enumClass = [
        ['badge text-bg-primary', 'badge text-bg-info'],
    ];

    public function mount(): void{
        $this->enumColNames   = ['gender'];
        $this->enumAttributes = [
            ['male', 'female'],
        ];

        $this->traitMount(
            ['Id', 'Name', 'Email', 'Gender', 'Action'],
            ['id', 'name', 'email', 'gender']
        );
    }

    public function destroy($id): int {
        return User::destroy($id);
    }

    public function render() {
        $users = User::where('name', 'LIKE', '%' . $this->searchStr . '%')
            ->paginate($this->showDataPerPage, [...$this->tableDataColumnNames]);

        return view('livewire.users', [
            'users' => $users,
        ]);
    }
}
