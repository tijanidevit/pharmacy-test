<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|unique:products',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'description' => 'required|string',
            'image' => 'required|file|mimetypes:image/png,image/jpg,image/jpeg,image/svg|max:5024',
        ];
    }

    public function messages() : array {
        return [
            'category_id.exists' => 'Category not found',
            'image.max' => 'Image size cannot be more than 5MB',
        ];
    }
}
