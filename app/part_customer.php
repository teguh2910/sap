<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class part_customer extends Model
{
    protected $primaryKey = 'id_part_customer';
    public function gudang_satu() {
        return $this->hasMany('App\gudang_satu','part_no','part_number');
    }
}
