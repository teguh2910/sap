<?php

namespace App\Http\Controllers;
use App\prod, App\stok, App\sj;
use Illuminate\Http\Request;

class ProdController extends Controller
{
    public function create() {
        $stoks=stok::where('category_part','fg')->get();
        return view('prod/create',compact('stoks'));
    }
    public function store(Request $request) {
        //create new data prod
        $prod = new prod;
        $prod->id_stok = $request->id_stok;
        $prod->qty_prod = $request->qty_prod;
        $prod->tgl_prod = $request->tgl_prod;
        $prod->save();
        //update stok
        $qty_beginning_balance = stok::where('id_stok',$request->id_stok)->value('beginning_balance');
        $sum_qty_prod=prod::where('id_stok',$request->id_stok)->sum('qty_prod');
        $sum_qty_sj=sj::where('id_stok',$request->id_stok)->sum('qty_sj');
        $ending_balance = $qty_beginning_balance + $sum_qty_prod - $sum_qty_sj;
        $stok = stok::find($request->id_stok);
        $stok->incoming_balance = $sum_qty_prod;
        $stok->ending_balance = $ending_balance;
        $stok->save();
        return redirect('stok');
    }
}
