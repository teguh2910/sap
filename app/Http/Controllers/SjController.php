<?php

namespace App\Http\Controllers;
use App\stok, App\sj, App\prod;
use Illuminate\Http\Request;

class SjController extends Controller
{
    public function create() {
        $stoks=stok::where('category_part','fg')->get();
        return view('sj/create',compact('stoks'));
    }
    public function store(Request $request) {
        //create new data sj
        $sj = new sj;
        $sj->id_stok = $request->id_stok;
        $sj->qty_sj = $request->qty_sj;
        $sj->tgl_sj = $request->tgl_sj;
        $sj->save();
        //update stok
        $qty_beginning_balance = stok::where('id_stok',$request->id_stok)->value('beginning_balance');
        $sum_qty_prod=prod::where('id_stok',$request->id_stok)->sum('qty_prod');
        $sum_qty_sj=sj::where('id_stok',$request->id_stok)->sum('qty_sj');
        $ending_balance = $qty_beginning_balance + $sum_qty_prod - $sum_qty_sj;
        $stok = stok::find($request->id_stok);
        $stok->usage_balance = $sum_qty_sj;
        $stok->ending_balance = $ending_balance;
        $stok->save();
        return redirect('stok');
    }
}
