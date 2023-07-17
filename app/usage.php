<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class usage extends Model
{
    protected $primaryKey = 'id_usage';
    public function prods()
    {
        return $this->hasMany('App\prod', 'id_prod','id_prod');
    }
    public function boms()
    {
        return $this->hasMany('App\bom', 'id_bom','id_bom');
    }
}
