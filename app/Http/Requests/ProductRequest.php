<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Set this to false if you need authorization checks.
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'sku' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'is_activate' => 'required|boolean',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Product name is required.',
            'price.required' => 'price is required.',
            'sku.required' => 'SKU is required.',
            'slug.required' => 'slug is required.',
            'is_activate.required' => 'Activate status is required.',
        ];
    }
}
