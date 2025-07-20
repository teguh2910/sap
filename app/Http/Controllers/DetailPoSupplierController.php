<?php

namespace App\Http\Controllers;
use App\Models\DetailPoSupplier;
use App\Models\Stok;
use App\Models\PoSupplier;
use App\Models\PartSupplier;
use Illuminate\Http\Request;

class DetailPoSupplierController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index($id) {
        $detailpos=DetailPoSupplier::with('material')->where('id_po',$id)->get();
        return view('detail_po_supplier/index',compact(['detailpos','id']));
    }
    public function create($id) {
        $po = PoSupplier::find($id);
        $material = PartSupplier::all();
        return view('detail_po_supplier/create',compact(['material','po']));
    }
    public function store(Request $request,$id) {
        $detailpo = new DetailPoSupplier;
        $detailpo->id_po=$id;
        $detailpo->id_material=$request->id_material;
        $detailpo->qty_po=$request->qty_po;
        $detailpo->harga_po=$request->harga_po;
        $detailpo->uom=$request->uom;
        $detailpo->save();
        return redirect('/detailpo/'.$id);
    }
    public function edit($id) {
        $po=DetailPoSupplier::find($id);
        $material = PartSupplier::all();
        return view('detail_po_supplier/edit',compact(['material','po']));
    }
    public function update(Request $request,$id){
        $detailpo=DetailPoSupplier::find($id);
        $detailpo->id_material=$request->id_material;
        $detailpo->qty_po=$request->qty_po;
        $detailpo->harga_po=$request->harga_po;
        $detailpo->uom=$request->uom;
        $detailpo->save();
        return redirect('/detailpo/'.$detailpo->id_po);
    }
    public function delete($id){
        $detailpo=DetailPoSupplier::find($id);
        $detailpo->delete();
        return redirect('/detailpo/'.$detailpo->id_po);
    }
    
}
