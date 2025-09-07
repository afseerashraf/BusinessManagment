<?php

namespace App\Http\Requests\invoice;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceEditRequest extends FormRequest
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
            'customer_id' => ['required', 'numeric'],
            'name' => ['required', 'regex:/^[a-zA-Z\s]+$/'],
            'date' => ['required', 'date'],
            'due_date' => ['required', 'date'],
            'total_amount' => ['required', 'numeric'],
            'status' => ['required', 'regex:/^[a-zA-Z\s]+$/'],
            'note' => ['nullable', 'regex:/^[a-zA-Z\s]+$/'],

        ];
    }
}
