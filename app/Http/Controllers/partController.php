<?php

namespace App\Http\Controllers;
use App\part;
use Illuminate\Http\Request;

class partController extends Controller
{
    public function index() {
        $part = part::all();
        return view('part/index', compact('part'));
    }
    public function create() {
        return view ('part/create');
    }
    public function store(Request $request) {
        $part = new part;
        $part->part_no = $request->part_no;
        $part->part_name = $request->part_name;
        $part->uom = $request->uom;
        $part->price = $request->price;
        $part->save();
        return redirect('part');
    }
    public function edit($id) {
        $part = part::find($id);
        return view('part/edit', compact(['part']));
    }
    public function update(Request $request, $id) {
        $part = part::find($id);
        $part->part_no = $request->part_no;
        $part->part_name = $request->part_name;
        $part->uom = $request->uom;
        $part->price = $request->price;
        $part->save();
        return redirect('part');
    }
    public function delete($id) {
        $part = part::find($id);
        $part->delete();
        return redirect('part');
    }
}
