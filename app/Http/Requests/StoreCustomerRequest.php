<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
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
            'nama_customer' => 'required|string|max:255',
            'alamat_customer' => 'nullable|string|max:500',
            'no_telp_customer' => 'nullable|string|max:20',
            'email_customer' => 'nullable|email|max:255|unique:customers,email_customer',
            'status' => 'nullable|in:active,inactive',
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'nama_customer.required' => 'Customer name is required.',
            'nama_customer.max' => 'Customer name may not be greater than 255 characters.',
            'email_customer.email' => 'Please provide a valid email address.',
            'email_customer.unique' => 'This email address is already registered.',
            'no_telp_customer.max' => 'Phone number may not be greater than 20 characters.',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     */
    public function attributes(): array
    {
        return [
            'nama_customer' => 'customer name',
            'alamat_customer' => 'customer address',
            'no_telp_customer' => 'phone number',
            'email_customer' => 'email address',
        ];
    }
}
