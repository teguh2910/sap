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
    public function incoming()
    {
        return $this->hasMany('App\detail_prod_g2', 'id_gudang_dua', 'id_gudang_dua')
        ->selectRaw('id_gudang_dua, sum(qty_prod_g2) as total_qty_prod_g2')
        ->groupBy('id_gudang_dua');
    }
}
