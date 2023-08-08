<?php

namespace App\Http\Controllers;
use App\po_customer, App\produk, App\customer;
use Illuminate\Http\Request;

class PoCustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index() {
        $po_customer = po_customer::all();
        return view('po_customer/index',compact('po_customer'));
    }
    public function create() {
        $produks = produk::all();
        $customers= customer::all();
        return view('po_customer/create',compact('produks','customers'));
    }
    public function store(Request $request){        
        $po_customer = new po_customer;
        $po_customer->no_po_customer = $request->no_po_customer;
        $po_customer->id_customer = $request->id_customer;
        $po_customer->tgl_po_customer = $request->tgl_po_customer;
        $po_customer->save();
        return redirect('/po_customer');
    }
    public function edit($id_po_customer) {
        $po_customer = po_customer::find($id_po_customer);
        $produks = produk::all();
        $customers= customer::all();
        return view('po_customer/edit',compact('po_customer','produks','customers'));
    }
    public function update($id_po_customer, Request $request) {
        // $this->validate($request,[
        //     'no_po_customer' => 'required',
        //     'id_customer' => 'required',
        //     'id_produk' => 'required',
        //     'qty_po_customer' => 'required',
        //     'harga_po_customer' => 'required',
        // ]);
        $po_customer = po_customer::find($id_po_customer);
        $po_customer->no_po_customer = $request->no_po_customer;
        $po_customer->id_customer = $request->id_customer;
        $po_customer->save();
        return redirect('/po_customer');
    }
    public function delete($id_po_customer) {
        $po_customer = po_customer::find($id_po_customer);
        $po_customer->delete();
        return redirect('/po_customer');
    }
}
