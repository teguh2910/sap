<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PoSupplier extends Model
{
    use HasFactory;

    protected $table = 'pos';
    protected $primaryKey = 'id_po';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'no_po',
        'tgl_po',
        'id_vendor',
        'status',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'tgl_po' => 'date',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    /**
     * Get the detail purchase orders for this PO.
     */
    public function detailPos(): HasMany
    {
        return $this->hasMany(DetailPoSupplier::class, 'id_po', 'id_po');
    }

    /**
     * Get the vendor that owns this PO.
     */
    public function vendor(): BelongsTo
    {
        return $this->belongsTo(Vendor::class, 'id_vendor', 'id_vendor');
    }
}
