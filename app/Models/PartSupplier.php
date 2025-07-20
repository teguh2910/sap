<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PartSupplier extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_part_supplier';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'part_number',
        'part_name',
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
     * Get the goods receipts for this part.
     */
    public function grs(): HasMany
    {
        return $this->hasMany(\App\Models\Gr::class, 'id_material', 'id_part_supplier');
    }

    /**
     * Get the detail purchase orders for this part.
     */
    public function detailPoSuppliers(): HasMany
    {
        return $this->hasMany(DetailPoSupplier::class, 'id_material', 'id_part_supplier');
    }
}
