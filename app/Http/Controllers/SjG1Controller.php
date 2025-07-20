<?php

namespace App\Http\Controllers;
use App\Models\Stok;
use App\Models\SjG1;
use App\Models\Truk;
use App\Models\GudangSatu;
use App\Models\PoCustomer;
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
        $po_customer = PoCustomer::all();
        return view('sj_g1/create',compact(['stoks','truks','po_customer']));
    }
    public function store(Request $request) {
        //create new data sjg1
        $sjg1 = new SjG1;
        $sjg1->id_gudang_satu = $request->id_gudang_satu;
        $sjg1->no_sj_g1 = $request->no_sj_g1;
        $sjg1->qty_sj_g1 = $request->qty_sj_g1;
        $sjg1->tgl_sj_g1 = $request->tgl_sj_g1;
        $sjg1->id_truk = $request->id_truk;
        $sjg1->id_po_customer = $request->id_po_customer;
        $sjg1->save();        
        return redirect('gudangsatu');
    }
    public function view($id){
        $sjg1=sj_g1::all();        
        return view('sj_g1/index',compact(['id','sjg1']));
    }
}
