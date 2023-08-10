<?php

namespace App\Http\Controllers;
use App\detail_po_supplier, App\stok, App\po_supplier, App\part_supplier;
use Illuminate\Http\Request;

class DetailPoSupplierController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index($id) {
        $detailpos=detail_po_supplier::where('id_po',$id)->get();        
        return view('detail_po_supplier/index',compact(['detailpos','id']));
    }
    public function create($id) {
        $po=po_supplier::find($id);
        $material = part_supplier::all();
        return view('detail_po_supplier/create',compact(['material','po']));
    }
    public function store(Request $request,$id) {
        $detailpo=new detail_po_supplier;
        $detailpo->id_po=$id;
        $detailpo->id_material=$request->id_material;
        $detailpo->qty_po=$request->qty_po;
        $detailpo->harga_po=$request->harga_po;
        $detailpo->uom=$request->uom;
        $detailpo->save();
        return redirect('/detailpo/'.$id);
    }
    public function edit($id) {
        $po=detail_po_supplier::find($id);
        $material = part_supplier::all();
        return view('detail_po_supplier/edit',compact(['material','po']));
    }
    public function update(Request $request,$id){
        $detailpo=detail_po_supplier::find($id);
        $detailpo->id_material=$request->id_material;
        $detailpo->qty_po=$request->qty_po;
        $detailpo->harga_po=$request->harga_po;
        $detailpo->uom=$request->uom;
        $detailpo->save();
        return redirect('/detailpo/'.$detailpo->id_po);
    }
    public function delete($id){
        $detailpo=detail_po_supplier::find($id);
        $detailpo->delete();
        return redirect('/detailpo/'.$detailpo->id_po);
    }
    
}
