<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PoCustomer extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_po_customer';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'no_po_customer',
        'id_customer',
        'id_produk',
        'qty_po_customer',
        'harga_po_customer'
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
     * Get the customer that owns this PO.
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'id_customer', 'id_customer');
    }

    /**
     * Get the detail purchase orders for this PO.
     */
    public function detailPoCustomers(): HasMany
    {
        return $this->hasMany(DetailPoCustomer::class, 'id_po_customer', 'id_po_customer');
    }
}
