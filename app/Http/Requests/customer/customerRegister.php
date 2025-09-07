<?php

namespace App\Http\Requests\customer;

use Illuminate\Foundation\Http\FormRequest;

class customerRegister extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'regex:/^[a-zA-Z0-9\s]+$/'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'regex:/^\+?[0-9]{10,12}$/'],
            'address' => ['required', 'regex:/^[a-zA-Z0-9\s,.\n-]+$/'],
        ];
    }
}
