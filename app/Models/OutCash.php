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
    protected $primaryKey = 'id_out_cash';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'id_bank',
        'id_vendor',
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
     * Get the vendor that owns this outgoing cash.
     */
    public function vendor(): BelongsTo
    {
        return $this->belongsTo(Vendor::class, 'id_vendor', 'id_vendor');
    }

    /**
     * Get the purchase order that owns this outgoing cash.
     */
    public function poSupplier(): BelongsTo
    {
        return $this->belongsTo(PoSupplier::class, 'id_po', 'id_po_supplier');
    }
}
