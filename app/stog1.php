<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class stog1 extends Model
{
    public function gudang_g1(){
        return $this->hasMany('App\gudang_satu','part_no','part_no');        
    }
}
