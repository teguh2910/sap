<?php

namespace App\Http\Controllers;
use App\prod_g2, App\basemetal, App\material, App\gudang_dua, App\po_customer, App\part_customer;
use Illuminate\Http\Request;

class ProdG2Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create() {
        $po_customer = po_customer::all();
        $part_customer = part_customer::all();
        return view('prod_g2/create',compact(['po_customer','part_customer']));
    }
    public function store(Request $request) {
        $prod_g2 = new prod_g2;
        $prod_g2->lot_prod_g2 = $request->lot_prod_g2;
        $prod_g2->tgl_prod_g2 = $request->tgl_prod_g2;
        $prod_g2->id_po_customer = $request->id_po_customer;
        $prod_g2->type = $request->type;
        $prod_g2->save();
        //update stok basemetal
        // $part_no_basemetal=basemetal::find($request->id_base_metal)->kode_base_metal;
        // $total_basemetal=prod_g2::where('id_base_metal',$request->id_base_metal)->sum('qty_prod_g2');
        // $gudangdua = gudang_dua::where('part_no',$part_no_basemetal)->first();
        // $gudangdua->incoming_balance = $total_basemetal;
        // $gudangdua->save();
        return redirect('/prodg2');
    }
    public function index(){
        $prod_g2 = prod_g2::all();
        return view('prod_g2/index',compact(['prod_g2']));
    }
}
