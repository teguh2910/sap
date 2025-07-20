<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class IncomingCash extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     */
    protected $table = 'incoming_cashes';

    /**
     * The primary key associated with the table.
     */
    protected $primaryKey = 'id_incoming_cashes';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'id_bank',
        'id_customer',
        'amount_incoming',
        'po_customer',
        'tgl_incoming_cash',
        'top',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'tgl_incoming_cash' => 'date',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    /**
     * Get the bank that owns this incoming cash.
     */
    public function bank(): BelongsTo
    {
        return $this->belongsTo(Bank::class, 'id_bank', 'id_bank');
    }

    /**
     * Get the customer that owns this incoming cash.
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'id_customer', 'id_customer');
    }

    /**
     * Boot the model and add event listeners.
     */
    protected static function boot()
    {
        parent::boot();

        static::created(function ($incomingCash) {
            $incomingCash->updateCashflow();
        });

        static::updated(function ($incomingCash) {
            $incomingCash->updateCashflow();
        });

        static::deleted(function ($incomingCash) {
            $incomingCash->updateCashflow();
        });
    }

    /**
     * Update the cashflow when incoming cash changes.
     */
    public function updateCashflow()
    {
        $bank = $this->bank;
        if (!$bank) return;

        // Find or create cashflow record for this bank
        $cashflow = Cashflow::firstOrCreate(
            [
                'bank' => $bank->nama_bank,
            ],
            [
                'beginning_balance' => 0,
                'incoming_balance' => 0,
                'out_balance' => 0,
                'ending_balance' => 0,
            ]
        );

        // Recalculate incoming total for this bank
        $totalIncoming = IncomingCash::where('id_bank', $this->id_bank)
            ->sum('amount_incoming');

        // Recalculate outgoing total for this bank
        $totalOutgoing = OutCash::where('id_bank', $this->id_bank)
            ->sum('amount_out');

        // Update cashflow
        $cashflow->incoming_balance = $totalIncoming;
        $cashflow->out_balance = $totalOutgoing;
        $cashflow->ending_balance = $cashflow->beginning_balance + $totalIncoming - $totalOutgoing;
        $cashflow->save();
    }
}
