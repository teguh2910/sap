<?php

namespace App\Http\Controllers;
use App\vendor;
use Illuminate\Http\Request;

class vendorController extends Controller
{
    public function index() {
        $vendor = vendor::all();
        return view('vendor/index', compact('vendor'));
    }
    public function create() {
        return view ('vendor/create');
    }
    public function store(Request $request) {
        $vendor = new vendor;
        $vendor->nama_vendor = $request->nama_vendor;
        $vendor->alamat_vendor = $request->alamat_vendor;
        $vendor->no_telp_vendor = $request->no_telp_vendor;
        $vendor->save();
        return redirect('vendor');
    }
    public function edit($id) {
        $vendor = vendor::find($id);
        return view('vendor/edit', compact(['vendor']));
    }
    public function update(Request $request, $id) {
        $vendor = vendor::find($id);
        $vendor->nama_vendor = $request->nama_vendor;
        $vendor->alamat_vendor = $request->alamat_vendor;
        $vendor->no_telp_vendor = $request->no_telp_vendor;
        $vendor->save();
        return redirect('vendor');
    }
    public function delete($id) {
        $vendor = vendor::find($id);
        $vendor->delete();
        return redirect('vendor');
    }
}
