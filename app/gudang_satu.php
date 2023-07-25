<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gudang_satu extends Model
{
    protected $primaryKey='id_gudang_satu';
    public function stos()
    {
        return $this->hasMany('App\stog1', 'part_no', 'part_no');
    }
}
