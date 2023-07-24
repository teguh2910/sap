<?php

namespace App\Http\Controllers;
use App\basemetal, Excel;
use Illuminate\Http\Request;

class BasemetalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index() {
        $basemetals = basemetal::all();
        return view('basemetal/index',compact('basemetals'));
    }
    public function create() {
        return view('basemetal/create');
    }
    public function store(Request $request) {
        //temp upload data rm
        // Excel::load('template_upload_basemetal.xlsx', function($reader) {
        //     foreach ($reader->get() as $m) {
        //         $basemetal = new basemetal;
        //         $basemetal->kode_base_metal = $m->kode;
        //         $basemetal->nama_base_metal = $m->nama;
        //         $basemetal->price_base_metal = $m->price;
        //         $basemetal->save();                
        //     }
        // });
        // dd('sukses');
        $basemetal = new basemetal;
        $basemetal->kode_base_metal = $request->kode_base_metal;   
        $basemetal->nama_base_metal = $request->nama_base_metal;
        $basemetal->price_base_metal = $request->price_base_metal;
        $basemetal->save();
        return redirect('/basemetal');
    }
    public function edit($id) {
        $basemetal = basemetal::find($id);
        return view('basemetal/edit', compact('basemetal'));
    }
    public function update($id, Request $request) {
        $basemetal = basemetal::find($id);
        $basemetal->kode_base_metal = $request->kode_base_metal;   
        $basemetal->nama_base_metal = $request->nama_base_metal;
        $basemetal->price_base_metal = $request->price_base_metal;
        $basemetal->save();
        return redirect('/basemetal');
    }
    public function delete($id) {
        $basemetal = basemetal::find($id);
        $basemetal->delete();
        return redirect('/basemetal');
    }
}
