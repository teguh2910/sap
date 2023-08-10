<?php

namespace App\Http\Controllers;
use App\gr, App\po_supplier, App\part_supplier, App\gudang_dua, App\gudang_satu, App\detail_po_supplier;
use Illuminate\Http\Request;

class GrController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create() {
        $po=po_supplier::all();
        $detail_po=detail_po_supplier::all();        
        return view('gr/create',compact('detail_po','po'));        
    }
    public function store(Request $request) {
        $po=detail_po_supplier::where('id_po',$request->id_po)->get();
        foreach($po as $p){
        $gr = new gr;
        $gr->tgl_gr = $request->tgl_gr;
        $gr->gudang = $request->gudang;        
        $gr->id_detail_po = $p->id_detail_po;
        $gr->id_material = $p->id_material;
        $gr->uom = $p->uom;
        $gr->harga_gr = $p->harga_po;
        $gr->save();
        }        
        return redirect('/gr');
    }
    public function index() {
        $gr = gr::where('qty_gr',null)->get();
        return view('gr/index',compact('gr'));
    }
    function update_gr(Request $request) {
        if($request->ajax()){
        gr::find($request->input('pk'))->update([$request->input('name') => $request->input('value')]);
        // $part_no=gr::find($request->input('pk'))->materials[0]->kode_material;
        // $id_material = gr::find($request->input('pk'))->materials[0]->id_material;
        // $gudang=gr::find($request->input('pk'))->gudang;
        // $total_gr = gr::where('id_material',$id_material)->sum('qty_gr');
        // if($gudang=='gudang_dua'){
        //     $gudangdua = gudang_dua::where('part_no',$part_no)->first();
        //     $gudangdua->incoming_balance = $total_gr;
        //     $gudangdua->save();
        // }else{
        //     $gudangsatu = gudang_satu::where('part_no',$part_no)->first();
        //     $gudangsatu->incoming_balance = $total_gr;
        //     $gudangsatu->save();
        // }
         return response()->json(['success' => true]);
        
     }
    }
}
