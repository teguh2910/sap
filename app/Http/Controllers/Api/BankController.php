<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBankRequest;
use App\Http\Resources\BankResource;
use App\Models\Bank;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class BankController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    /**
     * Display a listing of banks.
     */
    public function index(): AnonymousResourceCollection
    {
        $banks = Bank::paginate(15);
        return BankResource::collection($banks);
    }

    /**
     * Store a newly created bank.
     */
    public function store(StoreBankRequest $request): JsonResponse
    {
        $bank = Bank::create($request->validated());

        return response()->json([
            'message' => 'Bank created successfully',
            'data' => new BankResource($bank)
        ], 201);
    }

    /**
     * Display the specified bank.
     */
    public function show(Bank $bank): BankResource
    {
        return new BankResource($bank);
    }

    /**
     * Update the specified bank.
     */
    public function update(Request $request, Bank $bank): JsonResponse
    {
        $validated = $request->validate([
            'kode_bank' => 'required|string|max:255|unique:banks,kode_bank,' . $bank->id_bank . ',id_bank',
            'nama_bank' => 'required|string|max:255',
            'alamat_bank' => 'nullable|string|max:500',
            'no_rek_bank' => 'required|string|max:255',
            'currency_bank' => 'required|string|max:10',
        ]);

        $bank->update($validated);

        return response()->json([
            'message' => 'Bank updated successfully',
            'data' => new BankResource($bank)
        ]);
    }

    /**
     * Remove the specified bank.
     */
    public function destroy(Bank $bank): JsonResponse
    {
        $bank->delete();

        return response()->json([
            'message' => 'Bank deleted successfully'
        ]);
    }
}
