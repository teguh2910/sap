<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class invoice extends Model
{
    protected $primaryKey = 'id_invoice';
    public function po_customers(){
        return $this->hasMany('App\po_customer','id_po_customer','id_po_customer');
    }
    public function sj_g1s(){
        return $this->hasMany('App\sj_g1','id_po_customer','id_po_customer');
    }

}
