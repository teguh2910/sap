<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Casts\Attribute;

class DetailPoSupplier extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_detail_po';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_po',
        'id_material',
        'qty_po',
        'uom',
        'harga_po',
        'harga_gr',
        'qty_gr',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'qty_po' => 'integer',
            'harga_po' => 'decimal:2',
            'qty_gr' => 'integer',
            'harga_gr' => 'decimal:2',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    /**
     * Get the material (part supplier) for this detail.
     */
    public function material(): BelongsTo
    {
        return $this->belongsTo(PartSupplier::class, 'id_material', 'id_part_supplier');
    }

    /**
     * Get the purchase order for this detail.
     */
    public function po(): BelongsTo
    {
        return $this->belongsTo(PoSupplier::class, 'id_po', 'id_po');
    }

    /**
     * Get the goods receipts for this detail.
     */
    public function grs(): HasMany
    {
        return $this->hasMany(Gr::class, 'id_detail_po', 'id_detail_po');
    }

    /**
     * Get the out cash records for this detail.
     */
    public function outCashs(): HasMany
    {
        return $this->hasMany(OutCash::class, 'id_po', 'id_po');
    }

    /**
     * Get the quantity from goods receipt.
     */
    protected function qtyGr(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->grs->first()?->qty_gr ?? 0,
        );
    }

    /**
     * Get the price from goods receipt.
     */
    protected function hargaGr(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->grs->first()?->harga_gr ?? 0,
        );
    }
}
