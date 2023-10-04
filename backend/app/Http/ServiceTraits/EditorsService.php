<?php

namespace App\Http\ServiceTraits;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

trait EditorsService {
    public int $editorId;
    public string $name                  = '';
    public string $email                 = '';
    public string $prevEmail             = '';
    public ?string $phone                = '';
    public ?string $city                 = '';
    public ?string $address              = '';
    public ?string $state                = '';
    public string $password              = '';
    public string $password_confirmation = '';
    public array $roleOption             = ['Editor', 'Admin'];
    public array $statusOption           = ['pending', 'Allow'];
    public bool $role;
    public int $selectedRole;
    public int $selectedStatus;

    protected function rules() {
        if ($this->pageUrl == 'update') {
            $rulesForUpdate = [
                'name'    => 'required|string|max:255',
                'email'   => 'required|email|max:255|unique:editors,email,' . $this->editorId,
                'phone'   => 'required|string|max:11',
                'city'    => 'required|string|max:255',
                'address' => 'required|string|max:255',
                'state'   => 'required|string|max:255',
            ];

            if (!empty($this->password)) {
                $rulesForUpdate['password'] = ['required', 'confirmed', Password::min(8)->letters()->mixedCase()->numbers()->symbols()];
            }
            return $rulesForUpdate;
        } else {
            return [
                'name'     => 'required|string|max:255',
                'email'    => 'required|email|unique:editors,email|max:255',
                'phone'    => 'required|string|max:11',
                'city'     => 'required|string|max:255',
                'address'  => 'required|string|max:255',
                'state'    => 'required|string|max:255',
                'password' => ['required', 'confirmed', Password::min(8)->letters()->mixedCase()->numbers()->symbols()],
            ];
        }
    }

    public function updated(mixed $propertyName): void {
        $this->validateOnly($propertyName, $this->rules());
    }
}
