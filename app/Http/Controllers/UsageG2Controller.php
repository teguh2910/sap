<?php

namespace App\Http\Controllers;
use App\usage_g2, App\gudang_dua, App\material;
use Illuminate\Http\Request;

class UsageG2Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    function create() {
        $material = material::all();
        return view('usage_g2/create',compact('material'));
    }
    function store(Request $request) {
        $usage_g2 = new usage_g2;
        $usage_g2->id_material = $request->id_material;
        $usage_g2->qty_usage_g2 = $request->qty_usage_g2;
        $usage_g2->tgl_usage_g2 = $request->tgl_usage_g2;
        $usage_g2->lot_usage_g2 = $request->lot_usage_g2;
        $usage_g2->save();
        //update gudang2
        $part_no=material::find($request->id_material)->kode_material;
        $total_usage_g2=usage_g2::where('id_material',$request->id_material)->sum('qty_usage_g2');
        $gudangdua = gudang_dua::where('part_no',$part_no)->first();
        $gudangdua->usage_balance = $total_usage_g2;
        $gudangdua->save();        
        return redirect('/gudangdua');

    }
}
