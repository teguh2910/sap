<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailPoCustomer extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     */
    protected $table = 'detail_po_customers';

    /**
     * The primary key associated with the table.
     */
    protected $primaryKey = 'id_detail_po_customer';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'id_po_customer',
        'id_part_customer',
        'qty_po_customer',
        'harga_po_customer',
        'uom',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    /**
     * Get the purchase order customer that owns this detail.
     */
    public function poCustomer(): BelongsTo
    {
        return $this->belongsTo(PoCustomer::class, 'id_po_customer', 'id_po_customer');
    }

    /**
     * Get the part customer that owns this detail.
     */
    public function partCustomer(): BelongsTo
    {
        return $this->belongsTo(PartCustomer::class, 'id_part_customer', 'id_part_customer');
    }
}
