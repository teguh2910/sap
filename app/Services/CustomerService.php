<?php

namespace App\Services;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class CustomerService
{
    /**
     * Get all customers with caching.
     */
    public function getAllCustomers(): Collection
    {
        return Cache::remember('customers.all', 3600, function () {
            return Customer::orderBy('nama_customer')->get();
        });
    }

    /**
     * Create a new customer.
     */
    public function createCustomer(array $data): Customer
    {
        $customer = Customer::create($data);
        
        // Clear cache
        Cache::forget('customers.all');
        Cache::forget('customers.statistics');
        
        Log::info('Customer created', ['customer_id' => $customer->id_customer]);
        
        return $customer;
    }

    /**
     * Update an existing customer.
     */
    public function updateCustomer(Customer $customer, array $data): Customer
    {
        $customer->update($data);
        
        // Clear cache
        Cache::forget('customers.all');
        Cache::forget('customers.statistics');
        
        Log::info('Customer updated', ['customer_id' => $customer->id_customer]);
        
        return $customer;
    }

    /**
     * Delete a customer.
     */
    public function deleteCustomer(Customer $customer): bool
    {
        $customerId = $customer->id_customer;
        $result = $customer->delete();
        
        // Clear cache
        Cache::forget('customers.all');
        Cache::forget('customers.statistics');
        
        Log::info('Customer deleted', ['customer_id' => $customerId]);
        
        return $result;
    }

    /**
     * Get customer statistics.
     */
    public function getCustomerStatistics(): array
    {
        return Cache::remember('customers.statistics', 3600, function () {
            return [
                'total_customers' => Customer::count(),
                'active_customers' => Customer::where('status', 'active')->count(),
                'recent_customers' => Customer::where('created_at', '>=', now()->subDays(30))->count(),
            ];
        });
    }

    /**
     * Search customers by name or email.
     */
    public function searchCustomers(string $query): Collection
    {
        return Customer::where('nama_customer', 'like', "%{$query}%")
            ->orWhere('email_customer', 'like', "%{$query}%")
            ->orderBy('nama_customer')
            ->get();
    }
}
