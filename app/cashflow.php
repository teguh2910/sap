<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cashflow extends Model
{
    protected $primaryKey = 'id_cash_flow';
    function banks() {
        return $this->hasMany('App\bank', 'id_bank', 'id_bank');
    }
}
