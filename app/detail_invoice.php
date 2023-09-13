<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detail_invoice extends Model
{
    public function parts() {
        return $this->hasMany('App\part_customer','part_number','part');
    }
    public function invoices() {
        return $this->hasMany('App\invoice','id_invoice','id_invoice');
    }
}
