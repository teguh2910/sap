<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sj extends Model
{
    protected $primaryKey = 'id_sj';
    public function gudang_duas()
    {
        return $this->hasMany('App\gudang_dua', 'id_gudang_dua', 'id_gudang_dua');
    }
    public function truks()
    {
        return $this->hasMany('App\truk', 'id_truk', 'id_truk');
    }
}
