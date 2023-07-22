<?php

namespace App\Http\Controllers;
use App\prod_g2, App\basemetal, App\material, App\gudang_dua;
use Illuminate\Http\Request;

class ProdG2Controller extends Controller
{
    function create() {
        $material = material::all();
        $base_metal = basemetal::all();
        return view('prod_g2/create',compact(['material','base_metal']));
    }
    function store(Request $request) {
        $prod_g2 = new prod_g2;
        $prod_g2->id_base_metal = $request->id_base_metal;
        $prod_g2->qty_prod_g2 = $request->qty_prod_g2;
        $prod_g2->tgl_prod_g2 = $request->tgl_prod_g2;
        $prod_g2->lot_prod_g2 = $request->lot_prod_g2;
        $prod_g2->save();
        //update stok basemetal
        $part_no_basemetal=basemetal::find($request->id_base_metal)->kode_base_metal;
        $total_basemetal=prod_g2::where('id_base_metal',$request->id_base_metal)->sum('qty_prod_g2');
        $gudangdua = gudang_dua::where('part_no',$part_no_basemetal)->first();
        $gudangdua->incoming_balance = $total_basemetal;
        $gudangdua->save();
        return redirect('/prodg2');
    }
}
