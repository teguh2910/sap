<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gr extends Model
{
    protected $primaryKey = 'id_gr';
    protected $fillable = ['harga_gr','qty_gr'];
    public function materials() {
        return $this->hasMany('App\part_supplier','id_part_supplier','id_material');
    }
    public function detail_pos() {
        return $this->hasMany('App\detail_po_supplier','id_detail_po','id_detail_po');
    }
}
