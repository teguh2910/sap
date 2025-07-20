<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Services\CustomerService;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CustomerController extends Controller
{
    protected CustomerService $customerService;

    public function __construct(CustomerService $customerService)
    {
        $this->middleware('auth');
        $this->customerService = $customerService;
    }

    /**
     * Display a listing of customers.
     */
    public function index(): View
    {
        $this->authorize('viewAny', Customer::class);
        
        $customers = $this->customerService->getAllCustomers();
        $statistics = $this->customerService->getCustomerStatistics();
        
        return view('customer.index', compact('customers', 'statistics'));
    }

    /**
     * Show the form for creating a new customer.
     */
    public function create(): View
    {
        $this->authorize('create', Customer::class);
        
        return view('customer.create');
    }

    /**
     * Store a newly created customer in storage.
     */
    public function store(StoreCustomerRequest $request): RedirectResponse
    {
        $this->authorize('create', Customer::class);
        
        $customer = $this->customerService->createCustomer($request->validated());

        return redirect()->route('customers.index')
            ->with('success', 'Customer created successfully.');
    }

    /**
     * Display the specified customer.
     */
    public function show(Customer $customer): View
    {
        $this->authorize('view', $customer);
        
        return view('customer.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified customer.
     */
    public function edit(Customer $customer): View
    {
        $this->authorize('update', $customer);
        
        return view('customer.edit', compact('customer'));
    }

    /**
     * Update the specified customer in storage.
     */
    public function update(Request $request, Customer $customer): RedirectResponse
    {
        $this->authorize('update', $customer);
        
        $validated = $request->validate([
            'nama_customer' => 'required|string|max:255',
            'alamat_customer' => 'nullable|string|max:500',
            'no_telp_customer' => 'nullable|string|max:20',
            'email_customer' => 'nullable|email|max:255',
        ]);

        $this->customerService->updateCustomer($customer, $validated);

        return redirect()->route('customers.index')
            ->with('success', 'Customer updated successfully.');
    }

    /**
     * Remove the specified customer from storage.
     */
    public function destroy(Customer $customer): RedirectResponse
    {
        $this->authorize('delete', $customer);
        
        $this->customerService->deleteCustomer($customer);

        return redirect()->route('customers.index')
            ->with('success', 'Customer deleted successfully.');
    }
}
