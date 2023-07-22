<?php

namespace App\Http\Controllers;
use App\prod_g1, App\produk, App\gudang_satu;
use Illuminate\Http\Request;

class ProdG1Controller extends Controller
{
    function create() {
        $produk = produk::all();
        return view('prod_g1/create',compact(['produk']));
    }
    function store(Request $request) {
        $prod_g1 = new prod_g1;
        $prod_g1->id_produk = $request->id_produk;
        $prod_g1->qty_prod_g1 = $request->qty_prod_g1;
        $prod_g1->tgl_prod_g1 = $request->tgl_prod_g1;
        $prod_g1->lot_prod_g1 = $request->lot_prod_g1;
        $prod_g1->save();
        //update stok produk
        $part_no_produk=produk::find($request->id_produk)->kode_produk;        
        $total_produk=prod_g1::where('id_produk',$request->id_produk)->sum('qty_prod_g1');        
        $gudangsatu = gudang_satu::where('part_no',$part_no_produk)->first();
        $gudangsatu->incoming_balance = $total_produk;
        $gudangsatu->save();
        return redirect('/gudangsatu');
    }
}
