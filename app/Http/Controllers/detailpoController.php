<?php

namespace App\Http\Controllers;
use App\detail_po, App\stok, App\po;
use Illuminate\Http\Request;

class detailpoController extends Controller
{
    public function index($id) {
        $detailpos=detail_po::with('stoks')->where('id_po',$id)->get();        
        return view('detail_po/index',compact(['detailpos','id']));
    }
    public function create($id) {
        $po=po::find($id);
        $stoks=stok::all();
        return view('detail_po/create',compact(['stoks','po']));
    }
    public function store(Request $request,$id) {
        $detailpo=new detail_po;
        $detailpo->id_po=$id;
        $detailpo->id_stok=$request->id_stok;
        $detailpo->qty_po=$request->qty_po;
        $detailpo->harga_po=$request->harga_po;
        $detailpo->uom=$request->uom;
        $detailpo->save();
        return redirect('/detailpo/'.$id);
    }
}
