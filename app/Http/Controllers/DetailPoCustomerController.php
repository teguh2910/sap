<?php

namespace App\Http\Controllers;
use App\Models\DetailPoCustomer;
use App\Models\PoCustomer;
use App\Models\PartCustomer;
use Illuminate\Http\Request;

class DetailPoCustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index($id) {
        $detailpos = DetailPoCustomer::where('id_po_customer',$id)->with(['poCustomer', 'partCustomer'])->get();
        return view('detail_po_customer/index',compact('id','detailpos'));
    }
    public function create($id) {
        $no_po_customer = PoCustomer::find($id)->no_po_customer;
        $part_customer = PartCustomer::all();
        return view('detail_po_customer/create',compact('id','no_po_customer','part_customer'));
    }
    public function store(Request $request, $id) {
        $detail_po_customer = new DetailPoCustomer;
        $detail_po_customer->id_po_customer = $id;
        $detail_po_customer->id_part_customer = $request->id_part_customer;
        $detail_po_customer->qty_po_customer = $request->qty_po_customer;
        $detail_po_customer->harga_po_customer = $request->harga_po_customer;
        $detail_po_customer->uom = $request->uom;
        $detail_po_customer->save();
        return redirect('/detailpocustomer/'.$id);
    }
    public function edit($id) {
        $po = DetailPoCustomer::find($id);
        $part_customer = PartCustomer::all();
        return view('detail_po_customer/edit',compact(['part_customer','po','id']));
    }
    public function update(Request $request,$id){
        $detailpo = DetailPoCustomer::find($id);
        $detailpo->id_part_customer=$request->id_part_customer;
        $detailpo->qty_po_customer=$request->qty_po_customer;
        $detailpo->harga_po_customer=$request->harga_po_customer;
        $detailpo->uom=$request->uom;
        $detailpo->save();
        return redirect('/detailpocustomer/'.$detailpo->id_po_customer);
    }
    public function delete($id){
        $detailpo = DetailPoCustomer::find($id);
        $detailpo->delete();
        return redirect('/detailpocustomer/'.$detailpo->id_po_customer);
    }
}
