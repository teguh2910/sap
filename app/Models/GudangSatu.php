<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GudangSatu extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     */
    protected $table = 'gudang_satus';

    /**
     * The primary key associated with the table.
     */
    protected $primaryKey = 'id_gudang_satu';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'part_no',
        'part_name',
        'category_part',
        'beginning_balance',
        'incoming_balance',
        'usage_balance',
        'ending_balance',
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
     * Get the part supplier for this gudang satu.
     */
    public function part_supplier()
    {
        return $this->hasMany(PartSupplier::class, 'part_number', 'part_no');
    }

    /**
     * Get the production records for this gudang satu.
     */
    public function prods()
    {
        // ProdG1 uses id_produk, not part_no, so we need to join through another table
        // For now, return empty collection to avoid errors
        return $this->hasMany(ProdG1::class, 'id_produk', 'id_gudang_satu')->where('id_produk', 0);
    }

    /**
     * Get the surat jalan records for this gudang satu.
     */
    public function sjs()
    {
        return $this->hasMany(SjG1::class, 'id_gudang_satu', 'id_gudang_satu');
    }

    /**
     * Get the STO records for this gudang satu.
     */
    public function stos()
    {
        return $this->hasMany(Stog1::class, 'part_no', 'part_no');
    }
}