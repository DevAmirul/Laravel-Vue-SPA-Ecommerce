<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
            'phone' => 'required|max:11',
            'address' => 'required|max:255',
            'address_2' => 'required|max:255',
            'city' => 'required|max:100',
            'state' => 'required|max:100',
            'zip_code' => 'required|max:6',
            'discount' => 'required|numeric',
            'subtotal' => 'required|numeric',
            'total' => 'required|numeric',
            'shipping_method_id' => 'required|numeric',
            'shipping' => 'required|numeric',
            'payment' => 'required',
            'coupon_id' => 'required_if:numeric,nullable',
            'coupon' => 'required_if:numeric,nullable',
        ];
    }
}
