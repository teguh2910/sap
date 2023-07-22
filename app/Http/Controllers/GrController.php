<?php

namespace App\Http\Controllers;
use App\gr, App\po, App\material, App\gudang_dua, App\gudang_satu;
use Illuminate\Http\Request;

class GrController extends Controller
{
    public function create() {
        $po=po::all();
        $material=material::all();        
        return view('gr/create',compact(['po','material']));
    }
    public function store(Request $request) {
        $gr = new gr;
        $gr->id_po = $request->id_po;
        $gr->id_material = $request->id_material;
        $gr->qty_gr = $request->qty_gr;
        $gr->tgl_gr = $request->tgl_gr;
        $gr->gudang = $request->gudang;
        $gr->save();
        $part_no=material::find($request->id_material)->kode_material;
        $total_gr = gr::where('id_material',$request->id_material)->sum('qty_gr');
        if($request->gudang=='gudang_dua'){
            $gudangdua = gudang_dua::where('part_no',$part_no)->first();
            $gudangdua->incoming_balance = $total_gr;
            $gudangdua->save();
        }else{
            $gudangsatu = gudang_satu::where('part_no',$part_no)->first();
            $gudangsatu->incoming_balance = $total_gr;
            $gudangsatu->save();
        }
        return redirect('/gudangdua');
    }
    public function index() {
        $gr = gr::with(['po','material'])->get();
        return view('gr/index',compact('gr'));
    }
}