<?php

namespace App\Http\Requests\Expense;

use Illuminate\Foundation\Http\FormRequest;

class ExpenseRequest extends FormRequest
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
            'vendor_id' => ['required', 'numeric'],
            'description' => ['required', 'regex:/^[a-zA-Z0-9\s,.\n-]+$/'],
            'amount' => ['required', 'numeric'],
            'date' => ['required', 'date'],
            'category' => ['required'],
            'note' => ['required', 'regex:/^[a-zA-Z0-9\s,.\n-]+$/'],
        ];
    }
}
