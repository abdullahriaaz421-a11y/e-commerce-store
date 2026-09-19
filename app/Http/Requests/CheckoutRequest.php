<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => [ 'required', 'string', 'max:100',],
            'last_name' => [ 'required', 'string', 'max:100',],
            'email' => [ 'required', 'email', 'max:255',],
            'phone' => [ 'required', 'string', 'max:20',],
            'country' => [ 'required', 'string', 'max:100',],
            'city' => [ 'required', 'string', 'max:100',],
            'state' => [ 'nullable', 'string', 'max:100',],
            'street' => [ 'nullable', 'string', 'max:255',],
            'postal_code' => [ 'required', 'string', 'max:20',],
            'note' => [ 'nullable', 'string', 'max:1000',],
            // 'payment-method' => [
            //     'required',
            //     'in:credit-card,cod,apple,paypal',
            // ],
        ];
    }
}
