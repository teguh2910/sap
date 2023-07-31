<?php

namespace App\Http\Controllers;
use App\stok, App\sj_g1, App\truk, App\gudang_satu, App\po_customer;
use Illuminate\Http\Request;

class SjG1Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create() {
        $stoks=gudang_satu::where('category_part','fg')->get();
        $truks=truk::all();
        $po_customer=po_customer::all();
        return view('sj_g1/create',compact(['stoks','truks','po_customer']));
    }
    public function store(Request $request) {
        //create new data sjg1
        $sjg1 = new sj_g1;
        $sjg1->id_gudang_satu = $request->id_gudang_satu;
        $sjg1->qty_sj_g1 = $request->qty_sj_g1;
        $sjg1->tgl_sj_g1 = $request->tgl_sj_g1;
        $sjg1->id_truk = $request->id_truk;
        $sjg1->id_po_customer = $request->id_po_customer;
        $sjg1->save();
        //update stok
        $part_no=gudang_satu::find($request->id_gudang_satu)->part_no;
        $total_sjg1 = sj_g1::where('id_gudang_satu',$request->id_gudang_satu)->sum('qty_sj_g1');
        $gudangdua = gudang_satu::where('part_no',$part_no)->first();
        $gudangdua->usage_balance = $total_sjg1;
        $gudangdua->save();  
        return redirect('gudangsatu');
    }
    public function view($id){
        $sjg1=sj_g1::where('id_po_customer',$id)->get();        
        return view('sj_g1/index',compact(['id','sjg1']));
    }
}
