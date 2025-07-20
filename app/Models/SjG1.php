<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SjG1 extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     */
    protected $table = 'sj_g1s';

    /**
     * The primary key associated with the table.
     */
    protected $primaryKey = 'id_sj_g1';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'id_gudang_satu',
        'qty_sj',
        'tgl_sj',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'tgl_sj' => 'date',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }
}
