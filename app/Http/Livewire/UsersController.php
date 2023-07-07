<?php

namespace App\Http\Livewire;

use App\Http\Traits\TableHeaderTrait;
use App\Models\User;
use Livewire\Component;

class UsersController extends Component {
    use TableHeaderTrait;

    public function mount(): void{
        $this->traitMount(
            ['Id', 'Name', 'Email', 'Verified Date'],
            ['id', 'name', 'email', 'email_verified_at']
        );
    }

    public function update($userId) {
        return redirect()->route('subCategories.update', $userId);
    }

    public function render() {
        $users = User::where('name', 'LIKE', '%' . $this->searchStr . '%')
            ->paginate($this->showDataPerPage, [...$this->tableDataColumnNames]);
        return view('livewire.users', [
            'users' => $users,
        ]);
    }
}
