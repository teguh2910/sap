<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gudang_satu extends Model
{
    protected $primaryKey='id_gudang_satu';
    public function stos()
    {
        return $this->hasMany('App\stog1', 'part_no', 'part_no');
    }
    public function prods()
    {
        return $this->hasMany('App\detail_prod_g1', 'id_gudang_satu', 'id_gudang_satu');
    }
    public function sjs()
    {
        return $this->hasMany('App\sj_g1', 'id_gudang_satu', 'id_gudang_satu');
    }
    public function part_supplier()
    {
        return $this->hasMany('App\part_supplier', 'part_number', 'part_no');
    }
    public function incoming()
    {
        return $this->hasMany('App\detail_prod_g1', 'id_gudang_satu', 'id_gudang_satu')
        ->selectRaw('id_gudang_satu, sum(qty_prod_g1) as total_qty_prod_g1')
        ->where('category_part','FG')
        ->groupBy('id_gudang_satu');
    }
    public function usage()
    {
        return $this->hasMany('App\sj_g1', 'id_gudang_satu', 'id_gudang_satu')
        ->selectRaw('id_gudang_satu, sum(qty_sj) as total_qty_sj_g1')
        ->groupBy('id_gudang_satu');
    }
}
