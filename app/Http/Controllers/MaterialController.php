<?php

namespace App\Http\Controllers;
use App\material, Excel;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function index() {
        $materials = material::all();
        return view('material/index',compact('materials'));
    }
    public function create() {
        return view('material/create');
    }
    public function store(Request $request) {
        //temp upload data rm
        // Excel::load('template_upload_material.xlsx', function($reader) {
        //     foreach ($reader->get() as $m) {
        //         $material = new material;
        //         $material->kode_material = $m->kode;
        //         $material->nama_material = $m->nama;
        //         $material->price_material = $m->price;
        //         $material->save();                
        //     }
        // });
        $material = new material;
        $material->kode_material = $request->kode_material;   
        $material->nama_material = $request->nama_material;
        $material->price_material = $request->price_material;
        $material->save();
        return redirect('/material');
    }
    public function edit($id) {
        $material = material::find($id);
        return view('material/edit', compact('material'));
    }
    public function update($id, Request $request) {
        $material = material::find($id);
        $material->kode_material = $request->kode_material;   
        $material->nama_material = $request->nama_material;
        $material->price_material = $request->price_material;
        $material->save();
        return redirect('/material');
    }
    public function delete($id) {
        $material = material::find($id);
        $material->delete();
        return redirect('/material');
    }
}
