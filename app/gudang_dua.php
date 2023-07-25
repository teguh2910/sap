<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gudang_dua extends Model
{
    protected $primaryKey='id_gudang_dua';    
    public function stos()
    {
        return $this->hasMany('App\sto', 'part_no', 'part_no');
    }
}
