<?php

namespace App\Http\Controllers;
use App\stok, App\sj, App\truk, App\gudang_dua,App\gudang_satu;
use Illuminate\Http\Request;

class SjController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create() {
        $stoks=gudang_dua::where('category_part','fg')->get();
        $truks=truk::all();
        return view('sj_g2/create',compact(['stoks','truks']));
    }
    public function store(Request $request) {
        //create new data sj
        $sj = new sj;
        $sj->id_gudang_dua = $request->id_gudang_dua;
        $sj->qty_sj = $request->qty_sj;
        $sj->tgl_sj = $request->tgl_sj;
        $sj->id_truk = $request->id_truk;
        $sj->save();
        return redirect('sjg2');
    }
    public function index(){
        $data=sj::all();
        return view('sj_g2/index',compact('data'));
    }
    public function edit($id){
        $data=sj::find($id);
        $stoks=gudang_dua::where('category_part','fg')->get();
        $truks=truk::all();
        return view('sj_g2/edit',compact('data','id','stoks','truks'));
    }
    public function update(Request $request,$id) {
        //create new data sj
        $sj = sj::find($id);
        $sj->no_sj = $request->no_sj;
        $sj->id_gudang_dua = $request->id_gudang_dua;
        $sj->qty_sj = $request->qty_sj;
        $sj->tgl_sj = $request->tgl_sj;
        $sj->id_truk = $request->id_truk;
        $sj->save();                    
        return redirect('sjg2');
    }
    public function delete($id){
        sj::find($id)->delete();
        return redirect('sjg2');
    }
}
