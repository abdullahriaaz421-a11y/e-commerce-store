<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        if ($this->isMethod('post')) {
            return [
                'name'           => 'required|max:255',
                'price'          => 'required|min:0|numeric',
                'sale_price'     => 'required|min:0|numeric',
                'category_id'    => 'required',
                'alert_quantity' => 'required|min:0|integer',
                'colors'         => 'required',
                'sizes'          => ['required', 'array'],
                'sizes.*'        => ['in:S,M,L,XL,XXL'],
                'images'         => 'required|array|max:5120',
                'images.*'       => 'required|mimes:png,jpg,jpeg',
                'status'         => 'required|boolean',
                'description'    => 'required',
                'details'        => 'required',
            ];
        }
        return [
            'name'           => 'required|max:255',
            'price'          => 'required|min:0|numeric',
            'sale_price'     => 'required|min:0|numeric',
            'category_id'    => 'required',
            'alert_quantity' => 'required|min:0|integer',
            'colors'         => 'required',
            'sizes'          => 'required',
            'images'         => 'nullable|array|max:5120',
            'images.*'       => 'mimes:png,jpg,jpeg',
            'status'         => 'required|boolean',
            'description'    => 'required',
            'details'        => 'required',
        ];
    }
}
