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
    protected $primaryKey = 'id_incoming_cash';

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
}
