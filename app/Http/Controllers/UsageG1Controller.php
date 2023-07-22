<?php

namespace App\Http\Controllers;
use App\usage_g1, App\gudang_satu, App\basemetal;
use Illuminate\Http\Request;

class UsageG1Controller extends Controller
{
    function create() {
        $base_metal = basemetal::all();
        return view('usage_g1/create',compact('base_metal'));
    }
    function store(Request $request) {
        $usage_g1 = new usage_g1;
        $usage_g1->id_base_metal = $request->id_base_metal;
        $usage_g1->qty_usage_g1 = $request->qty_usage_g1;
        $usage_g1->tgl_usage_g1 = $request->tgl_usage_g1;
        $usage_g1->lot_usage_g1 = $request->lot_usage_g1;
        $usage_g1->save();
        //update gudang2
        $part_no=basemetal::find($request->id_base_metal)->kode_base_metal;
        $total_usage_g1=usage_g1::where('id_base_metal',$request->id_base_metal)->sum('qty_usage_g1');
        $gudangsatu = gudang_satu::where('part_no',$part_no)->first();
        $gudangsatu->usage_balance = $total_usage_g1;
        $gudangsatu->save();        
        return redirect('/gudangsatu');

    }
}
