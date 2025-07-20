<?php

namespace App\Http\Controllers;
use App\Models\PoCustomer;
use App\Models\PartCustomer;
use App\Models\Customer;
use Illuminate\Http\Request;

class PoCustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index() {
        $po_customer = PoCustomer::with('customer')->get();
        return view('po_customer/index',compact('po_customer'));
    }
    public function create() {
        $produks = PartCustomer::all();
        $customers = Customer::all();
        return view('po_customer/create',compact('produks','customers'));
    }
    public function store(Request $request){
        $po_customer = new PoCustomer;
        $po_customer->no_po_customer = $request->no_po_customer;
        $po_customer->id_customer = $request->id_customer;
        $po_customer->id_produk = $request->id_produk;
        $po_customer->qty_po_customer = $request->qty_po_customer;
        $po_customer->harga_po_customer = $request->harga_po_customer;
        $po_customer->save();
        return redirect()->route('po-customers.index');
    }
    public function edit($id_po_customer) {
        $po_customer = PoCustomer::find($id_po_customer);
        $produks = PartCustomer::all();
        $customers = Customer::all();
        return view('po_customer/edit',compact('po_customer','produks','customers'));
    }
    public function update($id_po_customer, Request $request) {
        $po_customer = PoCustomer::find($id_po_customer);
        $po_customer->no_po_customer = $request->no_po_customer;
        $po_customer->id_customer = $request->id_customer;
        $po_customer->id_produk = $request->id_produk;
        $po_customer->qty_po_customer = $request->qty_po_customer;
        $po_customer->harga_po_customer = $request->harga_po_customer;
        $po_customer->save();
        return redirect()->route('po-customers.index');
    }

    public function destroy($id_po_customer) {
        $po_customer = PoCustomer::find($id_po_customer);
        $po_customer->delete();
        return redirect()->route('po-customers.index');
    }

    public function delete($id_po_customer) {
        $po_customer = PoCustomer::find($id_po_customer);
        $po_customer->delete();
        return redirect()->route('po-customers.index');
    }
}
