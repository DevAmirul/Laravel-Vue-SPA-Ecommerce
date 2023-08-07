<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'name' => 'required|unique:posts|max:255',
            'email' => 'required|unique:posts|max:255',
            'password' => 'required|unique:posts|max:255',
            'gender' => 'required|max:255',
            'phone' => 'required|max:255',
            'address' => 'required|max:255',
            'address_2' => 'required|max:255',
            'city' => 'required|max:255',
            'state' => 'required|max:255',
            'zip_code' => 'required|max:255',
        ];
    }
}
