<?php

namespace App\Http\Requests\Setting;

use Illuminate\Foundation\Http\FormRequest;

class AddSettingRequest extends FormRequest
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
            'email' => 'required|email|unique:settings',
            'phone' => 'required|string|unique:settings',
        ];
    }

    public function messages() : array {
        return [
            'email.unique' => 'Email address already added',
            'phone.unique' => 'Phone number already added',
        ];
    }
}
