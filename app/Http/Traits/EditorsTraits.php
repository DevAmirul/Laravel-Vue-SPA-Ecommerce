<?php

namespace App\Http\Traits;

trait EditorsTraits {
    public string $name     = '';
    public string $email    = '';
    public string $phone    = '';
    public string $city     = '';
    public string $address  = '';
    public string $password = '';

    protected function rules() {
        if ($this->pageUrl = 'Update') {
            $rulesForUpdate = [
                'name'    => 'required|string|max:255',
                'email'   => 'required|email|max:255',
                'phone'   => 'required|string|max:11',
                'city'    => 'required|string|max:255',
                'address' => 'required|string',
            ];
            
            !empty($this->password) ? $rulesForUpdate['password'] = 'required|string|min:8' : null;
            return $rulesForUpdate;
        } else {
            return [
                'name'     => 'required|string|max:255',
                'email'    => 'required|email|unique:editors,email|max:255',
                'phone'    => 'required|string|max:11',
                'city'     => 'required|string|max:255',
                'address'  => 'required|string',
                'password' => 'required|string|min:8',
            ];
        }
    }

    public function updated($propertyName): void{
        $this->validateOnly($propertyName, $this->rules());
    }

}
