<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class part_supplier extends Model
{
    protected $primaryKey = 'id_part_supplier';
    public function grs()
    {
        return $this->hasMany('App\gr', 'id_material', 'id_part_supplier');
    }
}
