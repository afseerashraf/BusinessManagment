<?php

namespace App\Http\Requests\bank;

use Illuminate\Foundation\Http\FormRequest;

class bankRequest extends FormRequest
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
            'account_name' => ['required'],
            'account_number' => ['required', 'numeric'],
            'bankName' => ['required', 'regex:/^[a-zA-Z\s]+$/'],
            'ifsc_code' => ['required', 'regex:/^[a-zA-Z0-9\s,.\n-]+$/'],
            'balance' => ['required', 'numeric'],
        ];
    }
}
