<?php

namespace App\Http\Controllers;
use App\Models\Vendor;
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
        $validated = $request->validate([
            'kode_vendor' => 'required|string|max:255|unique:vendors,kode_vendor',
            'nama_vendor' => 'required|string|max:255',
            'alamat_vendor' => 'required|string|max:500',
        ]);

        $vendor = new Vendor;
        $vendor->kode_vendor = $validated['kode_vendor'];
        $vendor->nama_vendor = $validated['nama_vendor'];
        $vendor->alamat_vendor = $validated['alamat_vendor'];
        $vendor->save();
        return redirect()->route('vendors.index');
    }
    public function edit($id) {
        $vendor = Vendor::find($id);
        return view('vendor/edit', compact(['vendor']));
    }
    public function update(Request $request, $id) {
        $vendor = Vendor::find($id);
        $vendor->kode_vendor = $request->kode_vendor;
        $vendor->nama_vendor = $request->nama_vendor;
        $vendor->alamat_vendor = $request->alamat_vendor;
        $vendor->save();
        return redirect()->route('vendors.index');
    }

    public function destroy($id) {
        $vendor = Vendor::find($id);
        $vendor->delete();
        return redirect()->route('vendors.index');
    }

    public function delete($id) {
        $vendor = Vendor::find($id);
        $vendor->delete();
        return redirect()->route('vendors.index');
    }
}
