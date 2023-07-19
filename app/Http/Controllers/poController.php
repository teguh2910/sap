<?php

namespace App\Http\Controllers;
use App\po, App\vendor, App\bank, Excel;
use Illuminate\Http\Request;

class poController extends Controller
{
    public function index() {
        $pos=po::with(['vendors'])->get();
        return view('po/index', compact('pos'));
    }
    public function create() {
        $vendor=vendor::all();
        return view('po/create',compact('vendor'));
    }
    public function store(Request $request) {
        $po = new po;
        $po->id_vendor = $request->id_vendor;
        $po->tgl_po = $request->tgl_po;
        $po->top = $request->top;
        $po->delivery_by = $request->delivery_by;
        $po->delivery_date = $request->delivery_date;
        $po->quot_no = $request->quot_no;
        $po->pr_no = $request->pr_no;
        $po->vat = $request->vat;
        $po->save();
        return redirect('/po');
    }    
    public function edit($id) {
        $po = po::with('vendors')->find($id);
        $vendors=vendor::all();
        return view('po/edit', compact(['po','vendors']));
    }
    public function update(Request $request, $id) {
        $po = po::find($id);
        $po->id_vendor = $request->id_vendor;
        $po->tgl_po = $request->tgl_po;
        $po->top = $request->top;
        $po->delivery_by = $request->delivery_by;
        $po->delivery_date = $request->delivery_date;
        $po->quot_no = $request->quot_no;
        $po->pr_no = $request->pr_no;
        $po->vat = $request->vat;
        $po->save();
        return redirect('/po');
    }
    public function delete($id) {
        $po = po::find($id);
        $po->delete();
        return redirect('/po');
    }
    public function cetak($id) {        
        Excel::load('template_po.xls', function($excel) use ($id) {            
            $excel->sheet('DRAFT', function($sheet) use ($id) {
                $po=po::with('vendors')->find($id);
                $nama_vendor=$po->vendors->first()->nama_vendor;
                // Sheet manipulation
                $sheet->setCellValue('B8', $nama_vendor);
        
            });
        })->export('xls');
    }
}
