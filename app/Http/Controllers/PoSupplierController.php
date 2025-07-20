<?php

namespace App\Http\Controllers;
use App\Models\PoSupplier;
use App\Models\Vendor;
use App\Models\Bank;
use App\Models\DetailPoSupplier;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Exports\PoSupplierExport;

class PoSupplierController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index() {
$pos=PoSupplier::with(['vendor'])->get();
        return view('po_supplier/index', compact('pos'));
    }
    public function create() {
        $vendor=Vendor::all();
        return view('po_supplier/create',compact('vendor'));
    }
    public function store(Request $request) {
        $po = new PoSupplier;
        $po->id_vendor = $request->id_vendor;
        $po->tgl_po = $request->tgl_po;
        $po->top = $request->top;
        $po->delivery_by = $request->delivery_by;
        $po->delivery_date = $request->delivery_date;
        $po->quot_no = $request->quot_no;
        $po->pr_no = $request->pr_no;
        $po->vat = $request->vat;
        $po->note_po = $request->note_po;
        $po->save();
        return redirect('/po');
    }    
    public function edit($id) {
        $po = PoSupplier::with('vendor')->find($id);
        $vendors=Vendor::all();
        //dd($po->tgl_po);
        return view('po_supplier/edit', compact(['po','vendors']));
    }
    public function update(Request $request, $id) {
        $po = PoSupplier::find($id);
        $po->id_vendor = $request->id_vendor;
        $po->tgl_po = $request->tgl_po;
        $po->top = $request->top;
        $po->delivery_by = $request->delivery_by;
        $po->delivery_date = $request->delivery_date;
        $po->quot_no = $request->quot_no;
        $po->pr_no = $request->pr_no;
        $po->vat = $request->vat;
        $po->note_po = $request->note_po;
        $po->save();
        return redirect('/po');
    }
    public function destroy($id) {
        $po = PoSupplier::find($id);
        $po->delete();
        return redirect('/po');
    }
    public function print($id) {
        return (new PoSupplierExport($id))->export();
    }
}
