<?php

namespace App\Http\Controllers;
use App\po, App\vendor, App\bank, App\top, App\part;
use Illuminate\Http\Request;

class poController extends Controller
{
    public function index() {
        $pos=po::with(['detail_pos','note_pos','vendors','tops','banks'])->get();
        return view('po/index', compact('pos'));
    }
    public function create() {
        $vendor=vendor::all();
        $bank=bank::all();
        $top=top::all();
        $part=part::all();
        return view('po/create',compact(['vendor','bank','top','part']));
    }
    public function store(Request $request) {
        $po = new po;
        $po->id_po = $request->id_po;
        $po->id_vendor = $request->id_vendor;
        $po->id_top = $request->id_top;
        $po->id_bank = $request->id_bank;
        $po->id_part = $request->id_part;
        $po->qty = $request->qty;
        $po->save();
        return redirect('/po');
    }    
    public function edit($id) {
        $po = po::find($id);
        return view('po/edit', compact('po'));
    }
    public function update(Request $request, $id) {
        $po = po::find($id);
        $po->id_po = $request->id_po;
        $po->id_vendor = $request->id_vendor;
        $po->id_top = $request->id_top;
        $po->id_bank = $request->id_bank;
        $po->id_part = $request->id_part;
        $po->qty = $request->qty;
        $po->save();
        return redirect('/po');
    }
    public function delete($id) {
        $po = po::find($id);
        $po->delete();
        return redirect('/po');
    }
}
