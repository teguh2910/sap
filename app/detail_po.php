<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detail_po extends Model
{
    protected $primaryKey = 'id_detail_po';
    public function materials() {
        return $this->hasMany('App\material','id_material','id_material');
    }
}
