<?php

namespace App\Http\Controllers;
use App\gr, App\po, App\material, App\gudang_dua, App\gudang_satu, App\detail_po;
use Illuminate\Http\Request;

class GrController extends Controller
{
    public function create() {
        $po=po::all();
        $detail_po=detail_po::all();        
        return view('gr/create',compact('detail_po','po'));        
    }
    public function store(Request $request) {
        $po=detail_po::where('id_po',$request->id_po)->get();
        foreach($po as $p){
        $gr = new gr;
        $gr->tgl_gr = $request->tgl_gr;
        $gr->gudang = $request->gudang;        
        $gr->id_po = $p->id_po;
        $gr->id_material = $p->id_material;
        $gr->uom = $p->uom;
        $gr->harga_gr = $p->harga_po;
        $gr->save();
        }
        // $part_no=material::find($request->id_material)->kode_material;
        // $total_gr = gr::where('id_material',$request->id_material)->sum('qty_gr');
        // if($request->gudang=='gudang_dua'){
        //     $gudangdua = gudang_dua::where('part_no',$part_no)->first();
        //     $gudangdua->incoming_balance = $total_gr;
        //     $gudangdua->save();
        // }else{
        //     $gudangsatu = gudang_satu::where('part_no',$part_no)->first();
        //     $gudangsatu->incoming_balance = $total_gr;
        //     $gudangsatu->save();
        // }
        return redirect('/gr');
    }
    public function index() {
        $gr = gr::all();
        return view('gr/index',compact('gr'));
    }
    function update_gr(Request $request) {
        if($request->ajax()){
            gr::find($request->input('pk'))->update([$request->input('name') => $request->input('value')]);
         return response()->json(['success' => true]);
        
     }
    }
}
