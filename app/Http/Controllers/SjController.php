<?php

namespace App\Http\Controllers;
use App\stok, App\sj, App\prod, App\truk, App\gudang_dua;
use Illuminate\Http\Request;

class SjController extends Controller
{
    public function create() {
        $stoks=gudang_dua::where('category_part','fg')->get();
        $truks=truk::all();
        return view('sj/create',compact(['stoks','truks']));
    }
    public function store(Request $request) {
        //create new data sj
        $sj = new sj;
        $sj->id_gudang_dua = $request->id_gudang_dua;
        $sj->qty_sj = $request->qty_sj;
        $sj->tgl_sj = $request->tgl_sj;
        $sj->id_truk = $request->id_truk;
        $sj->save();
        //update stok
        $part_no=gudang_dua::find($request->id_gudang_dua)->part_no;
        $total_sj = sj::where('id_gudang_dua',$request->id_gudang_dua)->sum('qty_sj');
        $gudangdua = gudang_dua::where('part_no',$part_no)->first();
        $gudangdua->usage_balance = $total_sj;
        $gudangdua->save();        
        return redirect('stok');
    }
}
