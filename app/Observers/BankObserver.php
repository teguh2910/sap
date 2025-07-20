<?php

namespace App\Observers;

use App\Models\Bank;

class BankObserver
{
    /**
     * Handle the Bank "created" event.
     */
    public function created(Bank $bank): void
    {
        // Clear cache when a bank is created
        \Cache::forget('banks.all');
        \Cache::forget('banks.statistics');

        // Log the creation
        \Log::info('Bank created', [
            'bank_id' => $bank->id_bank,
            'bank_name' => $bank->nama_bank,
            'user_id' => auth()->id(),
        ]);

        // Dispatch event
        event(new \App\Events\BankCreated($bank));
    }

    /**
     * Handle the Bank "updated" event.
     */
    public function updated(Bank $bank): void
    {
        // Clear cache when a bank is updated
        \Cache::forget('banks.all');
        \Cache::forget('banks.statistics');
        \Cache::forget("banks.{$bank->id_bank}");

        // Log the update
        \Log::info('Bank updated', [
            'bank_id' => $bank->id_bank,
            'bank_name' => $bank->nama_bank,
            'user_id' => auth()->id(),
        ]);
    }

    /**
     * Handle the Bank "deleted" event.
     */
    public function deleted(Bank $bank): void
    {
        // Clear cache when a bank is deleted
        \Cache::forget('banks.all');
        \Cache::forget('banks.statistics');
        \Cache::forget("banks.{$bank->id_bank}");

        // Log the deletion
        \Log::info('Bank deleted', [
            'bank_id' => $bank->id_bank,
            'bank_name' => $bank->nama_bank,
            'user_id' => auth()->id(),
        ]);
    }

    /**
     * Handle the Bank "restored" event.
     */
    public function restored(Bank $bank): void
    {
        // Clear cache when a bank is restored
        \Cache::forget('banks.all');
        \Cache::forget('banks.statistics');

        // Log the restoration
        \Log::info('Bank restored', [
            'bank_id' => $bank->id_bank,
            'bank_name' => $bank->nama_bank,
            'user_id' => auth()->id(),
        ]);
    }

    /**
     * Handle the Bank "force deleted" event.
     */
    public function forceDeleted(Bank $bank): void
    {
        // Clear cache when a bank is force deleted
        \Cache::forget('banks.all');
        \Cache::forget('banks.statistics');
        \Cache::forget("banks.{$bank->id_bank}");

        // Log the force deletion
        \Log::info('Bank force deleted', [
            'bank_id' => $bank->id_bank,
            'bank_name' => $bank->nama_bank,
            'user_id' => auth()->id(),
        ]);
    }
}
