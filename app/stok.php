<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class stok extends Model
{
    protected $primaryKey = 'id_stok';
    public function prods() {
        return $this->hasMany('App\prod','id_stok','id_stok');
    }
}
