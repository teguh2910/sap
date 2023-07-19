<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detail_po extends Model
{
    protected $primaryKey = 'id_detail_po';
    public function stoks() {
        return $this->hasMany('App\stok','id_stok','id_stok');
    }
}
