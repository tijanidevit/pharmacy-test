<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class AddCustomerRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'address' => 'required|string',
            'image' => 'required|file|mimetypes:image/png,image/jpg,image/jpeg,image/svg|max:5024',
        ];
    }

    public function messages() : array {
        return [
            'image.max' => 'Image size cannot be more than 5MB',
            'email.users' => 'A user with this email address already added',
        ];
    }
}
