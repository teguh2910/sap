<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerRequest extends FormRequest
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
        $customerId = $this->route('customer')->id_customer;
        
        return [
            'kode_customer' => 'required|string|max:255|unique:customers,kode_customer,' . $customerId . ',id_customer',
            'nama_customer' => 'required|string|max:255',
            'alamat_customer' => 'required|string|max:500',
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'kode_customer.required' => 'Customer code is required.',
            'kode_customer.unique' => 'This customer code is already registered.',
            'nama_customer.required' => 'Customer name is required.',
            'nama_customer.max' => 'Customer name may not be greater than 255 characters.',
            'alamat_customer.required' => 'Customer address is required.',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     */
    public function attributes(): array
    {
        return [
            'kode_customer' => 'customer code',
            'nama_customer' => 'customer name',
            'alamat_customer' => 'customer address',
        ];
    }
}
