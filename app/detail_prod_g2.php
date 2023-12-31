<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detail_prod_g2 extends Model
{
    protected $primaryKey = 'id_detail_prod_g2';
    protected $fillable = ['id_prod_g2','id_gudang_dua','price_g2','qty_prod_g2'];
    public function gudang_duas()
    {
        return $this->hasMany('App\gudang_dua','id_gudang_dua','id_gudang_dua');
    }
    public function incoming()
    {
        return $this->hasMany('App\gudang_dua','id_gudang_dua','id_gudang_dua')
        ->where('category_part','=','FG');        
    }
}
