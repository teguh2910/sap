<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBankRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'kode_bank' => 'required|string|max:255|unique:banks,kode_bank',
            'nama_bank' => 'required|string|max:255',
            'alamat_bank' => 'nullable|string|max:500',
            'no_rek_bank' => 'required|string|max:255',
            'currency_bank' => 'required|string|max:10',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'kode_bank.required' => 'Bank code is required.',
            'kode_bank.unique' => 'Bank code already exists.',
            'nama_bank.required' => 'Bank name is required.',
            'no_rek_bank.required' => 'Account number is required.',
            'currency_bank.required' => 'Currency is required.',
        ];
    }
}
