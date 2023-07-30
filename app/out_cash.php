<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class out_cash extends Model
{
    protected $primaryKey='id_out_cashes';
    public function banks() {
        return $this->hasMany('App\bank','id_bank');
    }
    public function pos() {
        return $this->hasMany('App\po_supplier','id_po');
    }
}
