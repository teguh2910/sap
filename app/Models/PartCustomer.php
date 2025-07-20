<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartCustomer extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     */
    protected $table = 'part_customers';

    /**
     * The primary key associated with the table.
     */
    protected $primaryKey = 'id_part_customer';

    /**
     * The attributes that are mass assignable.
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
}
