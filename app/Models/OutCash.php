<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OutCash extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     */
    protected $table = 'out_cashes';

    /**
     * The primary key associated with the table.
     */
    protected $primaryKey = 'id_out_cashes';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'id_bank',
        'id_po',
        'amount_out',
        'category',
        'tgl_out_cash',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'tgl_out_cash' => 'date',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    /**
     * Get the bank that owns this outgoing cash.
     */
    public function bank(): BelongsTo
    {
        return $this->belongsTo(Bank::class, 'id_bank', 'id_bank');
    }

    /**
     * Get the PO supplier that owns this outgoing cash.
     */
    public function poSupplier(): BelongsTo
    {
        return $this->belongsTo(PoSupplier::class, 'id_po', 'id_po');
    }

    /**
     * Boot the model and add event listeners.
     */
    protected static function boot()
    {
        parent::boot();

        static::created(function ($outCash) {
            $outCash->updateCashflow();
        });

        static::updated(function ($outCash) {
            $outCash->updateCashflow();
        });

        static::deleted(function ($outCash) {
            $outCash->updateCashflow();
        });
    }

    /**
     * Update the cashflow when outgoing cash changes.
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
