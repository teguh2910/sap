<?php

namespace App\Http\Controllers;
use App\vendor;
use Illuminate\Http\Request;

class vendorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index() {
        $vendor = vendor::all();
        return view('vendor/index', compact('vendor'));
    }
    public function create() {
        return view ('vendor/create');
    }
    public function store(Request $request) {
        $vendor = new vendor;
        $vendor->kode_vendor = $request->kode_vendor;
        $vendor->nama_vendor = $request->nama_vendor;
        $vendor->alamat_vendor = $request->alamat_vendor;
        $vendor->save();
        return redirect('vendor');
    }
    public function edit($id) {
        $vendor = vendor::find($id);
        return view('vendor/edit', compact(['vendor']));
    }
    public function update(Request $request, $id) {
        $vendor = vendor::find($id);
        $vendor->kode_vendor = $request->kode_vendor;
        $vendor->nama_vendor = $request->nama_vendor;
        $vendor->alamat_vendor = $request->alamat_vendor;
        $vendor->save();
        return redirect('vendor');
    }
    public function delete($id) {
        $vendor = vendor::find($id);
        $vendor->delete();
        return redirect('vendor');
    }
}
