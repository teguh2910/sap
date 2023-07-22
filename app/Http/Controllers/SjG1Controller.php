<?php

namespace App\Http\Controllers;
use App\stok, App\sj_g1, App\truk, App\gudang_satu;
use Illuminate\Http\Request;

class SjG1Controller extends Controller
{
    public function create() {
        $stoks=gudang_satu::where('category_part','fg')->get();
        $truks=truk::all();
        return view('sj_g1/create',compact(['stoks','truks']));
    }
    public function store(Request $request) {
        //create new data sjg1
        $sjg1 = new sj_g1;
        $sjg1->id_gudang_satu = $request->id_gudang_satu;
        $sjg1->qty_sj_g1 = $request->qty_sj_g1;
        $sjg1->tgl_sj_g1 = $request->tgl_sj_g1;
        $sjg1->id_truk = $request->id_truk;
        $sjg1->save();
        //update stok
        $part_no=gudang_satu::find($request->id_gudang_satu)->part_no;
        $total_sjg1 = sj_g1::where('id_gudang_satu',$request->id_gudang_satu)->sum('qty_sj_g1');
        $gudangdua = gudang_satu::where('part_no',$part_no)->first();
        $gudangdua->usage_balance = $total_sjg1;
        $gudangdua->save();  
        return redirect('gudangsatu');
    }
}
