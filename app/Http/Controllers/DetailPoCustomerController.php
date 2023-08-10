<?php

namespace App\Http\Controllers;
use App\detail_po_customer, App\po_customer, App\part_customer;
use Illuminate\Http\Request;

class DetailPoCustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index($id) {
        $detailpos= detail_po_customer::where('id_po_customer',$id)->get();
        return view('detail_po_customer/index',compact('id','detailpos'));
    }
    public function create($id) {
        $no_po_customer= po_customer::find($id)->no_po_customer;
        $part_customer=part_customer::all();
        return view('detail_po_customer/create',compact('id','no_po_customer','part_customer'));
    }
    public function store(Request $request, $id) {
        $detail_po_customer = new detail_po_customer;
        $detail_po_customer->id_po_customer = $id;
        $detail_po_customer->id_part_customer = $request->id_part_customer;
        $detail_po_customer->qty_po_customer = $request->qty_po_customer;
        $detail_po_customer->harga_po_customer = $request->harga_po_customer;
        $detail_po_customer->uom = $request->uom;
        $detail_po_customer->save();
        return redirect('/detailpocustomer/'.$id);        
    }
    public function edit($id) {
        $po=detail_po_customer::find($id);
        $part_customer = part_customer::all();
        return view('detail_po_customer/edit',compact(['part_customer','po','id']));
    }
    public function update(Request $request,$id){
        $detailpo=detail_po_customer::find($id);
        $detailpo->id_part_customer=$request->id_part_customer;
        $detailpo->qty_po_customer=$request->qty_po_customer;
        $detailpo->harga_po_customer=$request->harga_po_customer;
        $detailpo->uom=$request->uom;
        $detailpo->save();
        return redirect('/detailpocustomer/'.$detailpo->id_po_customer);
    }
    public function delete($id){
        $detailpo=detail_po_customer::find($id);
        $detailpo->delete();
        return redirect('/detailpocustomer/'.$detailpo->id_po_customer);
    }
}
