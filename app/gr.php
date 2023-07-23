<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gr extends Model
{
    protected $primaryKey = 'id_gr';
    protected $fillable = ['harga_gr','qty_gr'];
    public function materials() {
        return $this->hasMany('App\material','id_material','id_material');
    }
    public function pos() {
        return $this->hasMany('App\po','id_po','id_po');
    }
}
