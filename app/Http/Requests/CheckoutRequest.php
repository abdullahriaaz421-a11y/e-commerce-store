<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class CheckoutRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'first_name'     => ['required', 'string', 'max:100'],
            'last_name'      => ['required', 'string', 'max:100'],
            'email'          => ['required', 'email', 'max:255'],
            'phone'          => ['required', 'string', 'max:20'],
            'country'        => ['required', 'string', 'max:100'],
            'city'           => ['required', 'string', 'max:100'],
            'state'          => ['nullable', 'string', 'max:100'],
            'street'         => ['nullable', 'string', 'max:255'],
            'postal_code'    => ['required', 'string', 'max:20'],
            'note'           => ['nullable', 'string', 'max:1000'],
            'payment_method' => ['required', 'in:stripe,paypal,cod'],
            'stripe_token'   => ['required_if:payment_method,stripe'],
        ];
    }
}
