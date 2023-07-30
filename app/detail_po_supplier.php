<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detail_po_supplier extends Model
{
    protected $primaryKey = 'id_detail_po';
    protected $fillable = ['harga_gr','qty_gr'];
    public function materials() {
        return $this->hasMany('App\material','id_material','id_material');
    }
    public function pos() {
        return $this->hasMany('App\po_supplier','id_po','id_po');
    }
    public function grs() {
        return $this->hasMany('App\gr','id_detail_po','id_detail_po');
    }
    public function out_cashs() {
        return $this->hasMany('App\out_cash', 'id_po', 'id_po');
    }
}