<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class prod_g1 extends Model
{
    protected $primaryKey = 'id_prod_g1';
    public function part_customers(){
        return $this->hasMany('App\part_customer','id_part_customer','type');
    }
    public function po_customers(){
        return $this->hasMany('App\po_customer','id_po_customer','id_po_customer');
    }
    public function detail_prod_g1()
    {
        return $this->hasMany('App\detail_prod_g1', 'id_prod_g1', 'id_prod_g1');
    }
}
