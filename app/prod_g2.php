<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class prod_g2 extends Model
{
    protected $primaryKey = 'id_prod_g2';
    public function part_customers(){
        return $this->hasMany('App\part_customer','id_part_customer','type');
    }
    public function po_customers(){
        return $this->hasMany('App\po_customer','id_po_customer','id_po_customer');
    }
}
