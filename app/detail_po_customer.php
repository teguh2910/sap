<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detail_po_customer extends Model
{
    protected $primaryKey = 'id_detail_po_customers';
    public function po_customers()
    {
        return $this->hasMany('App\po_customer','id_po_customer','id_po_customer');
    }
    public function part_customers()
    {
        return $this->hasMany('App\part_customer','id_part_customer','id_part_customer');
    }
}
