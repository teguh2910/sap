<?php

namespace App\Http\Controllers;
use App\detail_po, App\stok, App\po, App\material, App\basemetal;
use Illuminate\Http\Request;

class detailpoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index($id) {
        $detailpos=detail_po::with('materials')->where('id_po',$id)->get();        
        return view('detail_po/index',compact(['detailpos','id']));
    }
    public function create($id) {
        $po=po::find($id);
        $material = material::all();
        $basemetal = basemetal::all();
        return view('detail_po/create',compact(['material','basemetal','po']));
    }
    public function store(Request $request,$id) {
        $detailpo=new detail_po;
        $detailpo->id_po=$id;
        $detailpo->id_material=$request->id_material;
        $detailpo->qty_po=$request->qty_po;
        $detailpo->harga_po=$request->harga_po;
        $detailpo->uom=$request->uom;
        $detailpo->save();
        return redirect('/detailpo/'.$id);
    }
    
}
