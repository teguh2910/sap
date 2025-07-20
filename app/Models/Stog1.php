<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stog1 extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     */
    protected $table = 'stog1s';

    /**
     * The primary key associated with the table.
     */
    protected $primaryKey = 'id_sto_g1';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'part_no',
        'qty_sto',
        'tgl_sto',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'tgl_sto' => 'date',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    /**
     * Get the gudang satu records for this stog1.
     */
    public function gudang_g1()
    {
        return $this->hasMany(GudangSatu::class, 'part_no', 'part_no');
    }
}
