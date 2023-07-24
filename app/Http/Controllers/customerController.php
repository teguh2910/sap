<?php

namespace App\Http\Controllers;
use App\customer;
use Illuminate\Http\Request;

class customerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index() {
        $customer = customer::all();
        return view('customer/index', compact('customer'));
    }
    public function create() {
        return view ('customer/create');
    }
    public function store(Request $request) {
        $customer = new customer;
        $customer->kode_customer = $request->kode_customer;
        $customer->nama_customer = $request->nama_customer;
        $customer->alamat_customer = $request->alamat_customer;
        $customer->save();
        return redirect('customer');
    }
    public function edit($id) {
        $customer = customer::find($id);
        return view('customer/edit', compact(['customer']));
    }
    public function update(Request $request, $id) {
        $customer = customer::find($id);
        $customer->kode_customer = $request->kode_customer;
        $customer->nama_customer = $request->nama_customer;
        $customer->alamat_customer = $request->alamat_customer;
        $customer->save();
        return redirect('customer');
    }
    public function delete($id) {
        $customer = customer::find($id);
        $customer->delete();
        return redirect('customer');
    }
}
