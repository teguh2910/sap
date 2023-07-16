<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class po extends Model
{
    protected $primaryKey = 'id_po';
    public function detail_pos() {
        return $this->hasMany('App\detail_po', 'id_detail_po', 'id_detail_po');
    }
    public function note_pos() {
        return $this->hasMany('App\note_po', 'id_note_po', 'id_note_po');
    }
    public function banks() {
        return $this->hasMany('App\bank', 'id_bank', 'id_bank');
    }
    public function vendors() {
        return $this->hasMany('App\vendor', 'id_vendor', 'id_vendor');
    }
    public function tops() {
        return $this->hasMany('App\top', 'id_top', 'id_top');
    }
}
