<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Http\Requests\StoreBankRequest;
use App\Services\BankService;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class BankController extends Controller
{
    protected BankService $bankService;

    public function __construct(BankService $bankService)
    {
        $this->middleware('auth');
        $this->bankService = $bankService;
    }

    /**
     * Display a listing of banks.
     */
    public function index(): View
    {
        $this->authorize('viewAny', Bank::class);
        
        $banks = $this->bankService->getAllBanks();
        $statistics = $this->bankService->getBankStatistics();
        
        return view('bank.index', compact('banks', 'statistics'));
    }

    /**
     * Show the form for creating a new bank.
     */
    public function create(): View
    {
        $this->authorize('create', Bank::class);
        
        return view('bank.create');
    }

    /**
     * Store a newly created bank in storage.
     */
    public function store(StoreBankRequest $request): RedirectResponse
    {
        $this->authorize('create', Bank::class);
        
        $bank = $this->bankService->createBank($request->validated());

        return redirect()->route('banks.index')
            ->with('success', 'Bank created successfully.');
    }

    /**
     * Display the specified bank.
     */
    public function show(Bank $bank): View
    {
        $this->authorize('view', $bank);
        
        return view('bank.show', compact('bank'));
    }

    /**
     * Show the form for editing the specified bank.
     */
    public function edit(Bank $bank): View
    {
        $this->authorize('update', $bank);
        
        return view('bank.edit', compact('bank'));
    }

    /**
     * Update the specified bank in storage.
     */
    public function update(Request $request, Bank $bank): RedirectResponse
    {
        $this->authorize('update', $bank);
        
        $validated = $request->validate([
            'kode_bank' => 'required|string|max:255|unique:banks,kode_bank,' . $bank->id_bank . ',id_bank',
            'nama_bank' => 'required|string|max:255',
            'alamat_bank' => 'nullable|string|max:500',
            'no_rek_bank' => 'required|string|max:255',
            'currency_bank' => 'required|string|max:10',
        ]);

        $this->bankService->updateBank($bank, $validated);

        return redirect()->route('banks.index')
            ->with('success', 'Bank updated successfully.');
    }

    /**
     * Remove the specified bank from storage.
     */
    public function destroy(Bank $bank): RedirectResponse
    {
        $this->authorize('delete', $bank);
        
        $this->bankService->deleteBank($bank);

        return redirect()->route('banks.index')
            ->with('success', 'Bank deleted successfully.');
    }
}
