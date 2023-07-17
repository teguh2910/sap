<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bom extends Model
{
    protected $primaryKey = 'id_bom';
    public function prods()
    {
        return $this->hasMany('App\prod','part_no','fg_name');
    }
}
