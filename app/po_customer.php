<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class po_customer extends Model
{
    protected $primaryKey = 'id_po_customer';
    public function customers() {
        return $this->hasMany('App\customer','id_customer','id_customer');
    }
    public function produks() {
        return $this->hasMany('App\part_customer','id_part_customer','id_produk');
    }
    
    public function detail_po_customer() {
        return $this->hasMany('App\detail_po_customer','id_po_customer','id_po_customer');
    }
    
}
