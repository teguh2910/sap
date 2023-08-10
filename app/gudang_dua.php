<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gudang_dua extends Model
{
    protected $primaryKey='id_gudang_dua';    
    public function stos()
    {
        return $this->hasMany('App\sto', 'part_no', 'part_no');
    }
    public function prods()
    {
        return $this->hasMany('App\detail_prod_g2', 'id_gudang_dua', 'id_gudang_dua');
    }
    public function sjs()
    {
        return $this->hasMany('App\sj', 'id_gudang_dua', 'id_gudang_dua');
    }
    public function part_supplier()
    {
        return $this->hasMany('App\part_supplier', 'part_number', 'part_no');
    }
    public function incoming()
    {
        return $this->hasMany('App\detail_prod_g2', 'id_gudang_dua', 'id_gudang_dua')
        ->selectRaw('id_gudang_dua, sum(qty_prod_g2) as total_qty_prod_g2')
        ->where('category_part','FG')
        ->groupBy('id_gudang_dua');
    }
    public function usage()
    {
        return $this->hasMany('App\sj', 'id_gudang_dua', 'id_gudang_dua')
        ->selectRaw('id_gudang_dua, sum(qty_sj) as total_qty_sj_g2')
        ->groupBy('id_gudang_dua');
    }
}
