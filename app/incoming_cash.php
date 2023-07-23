<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class incoming_cash extends Model
{
    protected $primayKey = 'id_incoming_cash';
    public function banks() {
        return $this->hasMany('App\bank','id_bank','id_bank');
    }
    public function customers() {
        return $this->hasMany('App\customer','id_customer','id_customer');
    }

}
