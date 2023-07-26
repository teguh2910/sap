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
        return $this->hasMany('App\produk','id_produk','id_produk');
    }
    
}
