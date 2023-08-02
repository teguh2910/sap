<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detail_prod_g1 extends Model
{
    protected $primaryKey = 'id_detail_prod_g1';
    protected $fillable = ['id_prod_g1','id_gudang_satu','price_g1','qty_prod_g1'];
    public function gudang_satus()
    {
        return $this->hasMany('App\gudang_satu','id_gudang_satu','id_gudang_satu');
    }
    public function incoming()
    {
        return $this->hasMany('App\gudang_satu','id_gudang_satu','id_gudang_satu')
        ->where('category_part','=','FG');        
    }
}
