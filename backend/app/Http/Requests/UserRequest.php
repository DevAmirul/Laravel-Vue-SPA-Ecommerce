<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {

        return [
            'name' => 'required|max:100',
            'email' => 'required|max:200|unique:users,email,' . $this->id,
            'phone' => 'required|max:11',
            'address' => 'required|max:255',
            'address_2' => 'required|max:255',
            'city' => 'required|max:100',
            'state' => 'required|max:100',
            'zip_code' => 'required|max:6',
            'password' => [Rule::when(
                $this->password,
                Password::min(8)->symbols()->numbers(),
                'nullable'
            )],
            'password_confirmation' => 'sometimes|same:password',
        ];
    }
}
