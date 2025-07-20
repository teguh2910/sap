<?php

namespace App\Services;

use App\Models\Bank;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class BankService
{
    /**
     * Get all banks with caching.
     */
    public function getAllBanks(): Collection
    {
        return Cache::remember('banks.all', 3600, function () {
            Log::info('Fetching banks from database');
            return Bank::all();
        });
    }

    /**
     * Get bank by ID with caching.
     */
    public function getBankById(int $id): ?Bank
    {
        return Cache::remember("banks.{$id}", 3600, function () use ($id) {
            return Bank::find($id);
        });
    }

    /**
     * Create a new bank and clear cache.
     */
    public function createBank(array $data): Bank
    {
        $bank = Bank::create($data);
        $this->clearBankCache();
        
        Log::info('Bank created', ['bank_id' => $bank->id_bank]);
        
        return $bank;
    }

    /**
     * Update bank and clear cache.
     */
    public function updateBank(Bank $bank, array $data): Bank
    {
        $bank->update($data);
        $this->clearBankCache();
        $this->clearBankCache($bank->id_bank);
        
        Log::info('Bank updated', ['bank_id' => $bank->id_bank]);
        
        return $bank;
    }

    /**
     * Delete bank and clear cache.
     */
    public function deleteBank(Bank $bank): bool
    {
        $bankId = $bank->id_bank;
        $result = $bank->delete();
        
        if ($result) {
            $this->clearBankCache();
            $this->clearBankCache($bankId);
            Log::info('Bank deleted', ['bank_id' => $bankId]);
        }
        
        return $result;
    }

    /**
     * Clear bank cache.
     */
    private function clearBankCache(?int $bankId = null): void
    {
        Cache::forget('banks.all');
        
        if ($bankId) {
            Cache::forget("banks.{$bankId}");
        }
    }

    /**
     * Get bank statistics.
     */
    public function getBankStatistics(): array
    {
        return Cache::remember('banks.statistics', 1800, function () {
            return [
                'total_banks' => Bank::count(),
                'banks_by_currency' => Bank::selectRaw('currency_bank, COUNT(*) as count')
                    ->groupBy('currency_bank')
                    ->pluck('count', 'currency_bank')
                    ->toArray(),
            ];
        });
    }
}
