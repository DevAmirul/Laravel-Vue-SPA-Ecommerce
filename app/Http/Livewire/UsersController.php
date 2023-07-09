<?php

namespace App\Http\Livewire;

use App\Http\Traits\TableHeaderTrait;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class UsersController extends Component {
    use TableHeaderTrait;

    public function mount(): void{
        $this->traitMount(
            ['Id', 'Name', 'Email', 'Phone', 'City', 'State', 'ZipCode', 'verify time', 'Action'],
            ['id', 'name', 'email', 'phone', 'city', 'state', 'zip_code', 'email_verified_at']
        );
    }

    public function update($userId) {
        return redirect()->route('subCategories.update', $userId);
    }

    public function destroy($id): int {
        return User::destroy($id);
    }

    public function render() {
        $users = DB::table('users')
            ->join('user_addresses', 'users.id', '=', 'user_addresses.user_id')
            ->select('users.id', 'users.name', 'users.email', 'users.email_verified_at', 'user_addresses.phone', 'user_addresses.city', 'user_addresses.state', 'user_addresses.zip_code')
            ->get();

        return view('livewire.users', [
            'users' => $users,
        ]);
    }
}


