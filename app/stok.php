<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class stok extends Model
{
    protected $PrimaryKey = 'id_stok';
    public function part()
    {
        return $this->belongsTo('App\part', 'id_part','id_part');
    }
}
