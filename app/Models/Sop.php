<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sop extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     */
    protected $table = 'sops';

    /**
     * The primary key associated with the table.
     */
    protected $primaryKey = 'id_sop';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'nama_sop',
        'file_sop',
    ];
}