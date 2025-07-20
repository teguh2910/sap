<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cashflow extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     */
    protected $table = 'cashflows';

    /**
     * The primary key associated with the table.
     */
    protected $primaryKey = 'id_cash_flow';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'bank',
        'beginning_balance',
        'incoming_balance',
        'out_balance',
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
}
