<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sj_g1 extends Model
{
    protected $primaryKey = 'id_sj_g1';
    public function gudang_satus(){
        return $this->hasMany('App\gudang_satu','id_gudang_satu','id_gudang_satu');
    }
    public function po_customers(){
        return $this->hasMany('App\detail_po_customer','id_po_customer','id_po_customer');
    }
    public function truks(){
        return $this->hasMany('App\truk','id_truk','id_truk');
    }
    
}
