<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
                'category_name' => 'required|unique:categories,category_name',
                'status'        => 'required|boolean',
                'image'         => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ];
        }

        return [
            'category_name' => 'required',
            'status'        => 'required',
            'image'         => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'category_name.required' => 'Category Name is Required!',
            'status.required'        => 'Please Select Any Category Status!',
            'category_name.unique'   => 'This Category Alredy Exsists!',
        ];
    }
}
